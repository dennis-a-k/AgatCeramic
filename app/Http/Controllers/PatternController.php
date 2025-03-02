<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatternRequest;
use App\Models\Pattern;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patterns = Pattern::orderBy('title', 'ASC')->get();
        return view('pages.admin.patterns', compact('patterns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatternRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Pattern::create($data);
        return back()->with('status', 'patterns-created');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatternRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        Pattern::where('id', $request->id)->update($data);
        return back()->with('status', 'patterns-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Pattern::find($request->id)->delete();
        return back()->with('status', 'patterns-deleted');
    }
}
