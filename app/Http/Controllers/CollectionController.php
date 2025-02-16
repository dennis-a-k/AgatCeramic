<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.collections', ['collections' => $collections]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionRequest $request)
    {
        $request->validated();
        Collection::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'collections-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionRequest $request)
    {
        $request->validated();
        Collection::where('id', $request->id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);
        return back()->with('status', 'collections-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Collection::find($request->id)->delete();
        return back();
    }
}
