<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroutTypeController extends Controller
{
    public function index()
    {
        $zatirka = Category::where('title', config('categories.zatirka'))->first() ?? '';
        $categories = !empty($zatirka) ? Category::with('children.children')->where('id', $zatirka->id)->firstOrFail() : '';
        return view('pages.admin.zatirka', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $zatirka = Category::where('title', config('categories.zatirka'))->first() ?? '';
        Category::create([
            'title' => $request->title,
            'subtitle' => $request->title,
            'slug' => Str::slug($request->title),
            'parent_id' => $zatirka->id ?? '',
        ]);

        return back()->with('status', 'grout-created');
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);
        $category = Category::findOrFail($request->id);
        $category['title'] = $request->title;
        $category['subtitle'] = $request->title;
        $category['slug'] = Str::slug($request->title);
        $category->save();
        return back()->with('status', 'grout-updated');
    }
}
