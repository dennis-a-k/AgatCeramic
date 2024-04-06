<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizesRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.sizes', ['sizes' => $sizes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizesRequest $request)
    {
        $request->validated();
        Size::create(['title' => $request->title]);
        return back()->with('status', 'sizes-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SizesRequest $request)
    {
        $request->validated();
        Size::where('id', $request->id)->update(['title' => $request->title]);
        return back()->with('status', 'sizes-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Size::find($request->id)->delete();
        return back();
    }
}
