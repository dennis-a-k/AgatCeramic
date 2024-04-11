<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.brands', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        $brand = new Brand();
        $brand->title = $data['title'];

        if ($request->hasFile('img')) {
            $slug = Str::slug($brand->title );
            $name = $slug . '_brand' . '.' . $data['img']->getClientOriginalExtension();
            $brand->img = Storage::disk('public')->putFileAs('/brands', $data['img'], $name);;
        }

        $brand->save();

        return back()->with('status', 'brand-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request)
    {
        $request->validated();
        Brand::where('id', $request->id)->update([
            'title' => $request->title,
            'img' => $request->img,
        ]);
        return back()->with('status', 'brand-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Brand::find($request->id)->delete();
        return back();
    }
}
