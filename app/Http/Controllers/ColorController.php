<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.colors', ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        $request->validated();
        Color::create([
            'title' => $request->title,
            'code' => $request->code,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'color-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request)
    {
        $request->validated();
        Color::where('id', $request->id)->update([
            'title' => $request->title,
            'code' => $request->code,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'color-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Color::find($request->id)->delete();
        return back();
    }
}
