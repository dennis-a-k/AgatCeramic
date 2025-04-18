<?php

namespace App\Http\Controllers;

use App\Models\AppData;
use Illuminate\Http\Request;

class AppDataController extends Controller
{
    public function index()
    {
        $data = AppData::all();
        // dd($data);
        return view('pages.admin.app-data', compact('data'));
    }
}
