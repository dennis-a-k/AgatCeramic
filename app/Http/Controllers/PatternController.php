<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatternRequest;
use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patterns = Pattern::query()->orderBy('title', 'ASC')->get();
        return view('pages.admin.patterns', ['patterns' => $patterns]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatternRequest $request)
    {
        $request->validated();
        Pattern::create(['title' => $request->title]);
        return back()->with('status', 'patterns-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PatternRequest $request)
    {
        $request->validated();
        Pattern::where('id', $request->id)->update(['title' => $request->title]);
        return back()->with('status', 'patterns-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Pattern::find($request->id)->delete();
        return back();
    }
}
