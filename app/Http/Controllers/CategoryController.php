<?php
// CategoryController.php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\SortableProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use SortableProducts;

    public function index()
    {
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.categories', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::create($data);
        return back()->with('status', 'category-created');
    }

    public function update(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Category::where('id', $request->id)->update($data);
        return back()->with('status', 'category-updated');
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return back();
    }

    public function filterProducts(string $categorySlug, Request $request, string $title = '')
    {
        // Получаем категорию
        $category = Category::where('slug', $categorySlug)->first();

        if ($category) {
            $title = mb_strtoupper(mb_substr($category->title, 0, 1, 'UTF-8'), 'UTF-8') .
                    mb_substr($category->title, 1, null, 'UTF-8');

            // Базовый запрос для всех товаров категории
            $baseQuery = Product::where('category_id', $category->id)
                ->where('is_published', true);

            // Клонируем запрос для получения всех характеристик
            $characteristicsQuery = clone $baseQuery;

            // Получаем все товары для извлечения характеристик (без пагинации)
            $allCategoryProducts = $characteristicsQuery->with([
                'color', 'brand', 'pattern', 'texture', 'size'
            ])->get();

            // Получаем все характеристики
            $colors = $allCategoryProducts->pluck('color')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $brands = $allCategoryProducts->pluck('brand')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $patterns = $allCategoryProducts->pluck('pattern')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $textures = $allCategoryProducts->pluck('texture')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            $sizes = $allCategoryProducts->pluck('size')
                ->flatten()
                ->filter()
                ->unique('id')
                ->sortBy('title')
                ->values();

            // Применяем сортировку к базовому запросу
            $query = $this->applySorting($baseQuery, $request->input('sort'));

            // Получаем товары с пагинацией
            $goods = $query->with(['color', 'brand', 'pattern', 'texture', 'size'])
                ->paginate(40);
        } else {
            $goods = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 40);
            $colors = collect();
            $brands = collect();
            $patterns = collect();
            $textures = collect();
            $sizes = collect();
        }

        return view('pages.goods', compact(
            'goods',
            'category',
            'title',
            'colors',
            'brands',
            'patterns',
            'textures',
            'sizes'
        ));
    }
}
