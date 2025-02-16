<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::query()->orderBy('name', 'ASC')->get();
        return view('pages.admin.countries', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $request->validated();
        Country::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back()->with('status', 'countries-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request)
    {
        $request->validated();
        Country::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return back()->with('status', 'countries-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Country::find($request->id)->delete();
        return back();
    }
}
