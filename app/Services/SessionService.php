<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionService
{
    public function applyFilter(Request $request, string $type): void
    {
        if ($request->has($type)) {
            Session::put("current_{$type}_slug", $request->$type);
        }
    }

    public function getSlug(string $type): ?string
    {
        return Session::get("current_{$type}_slug");
    }
}
