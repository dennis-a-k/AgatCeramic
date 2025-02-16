<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextureRequest;
use App\Models\Texture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $textures = Texture::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.textures', ['textures' => $textures]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TextureRequest $request)
    {
        $request->validated();
        Texture::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'textures-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TextureRequest $request)
    {
        $request->validated();
        Texture::where('id', $request->id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'textures-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Texture::find($request->id)->delete();
        return back();
    }
}
