<?php

namespace App\Http\Controllers;

use App\Models\Category;

class SantekhnikaController extends Controller
{
    public function index()
    {
        $santexnika = Category::where('title', config('categories.santexnika'))->first() ?? '';
        $plumbing = !empty($santexnika) ? Category::with('children.children')->where('id', $santexnika->id)->firstOrFail() : '';
        // dd($plumbing);
        return view('pages.plumbing', ['title' => config('categories.santexnika'), 'plumbing' => $plumbing]);
    }
}
