<?php

namespace App\Http\Controllers;

use App\Models\AppData;
use Illuminate\Http\Request;

class AppDataController extends Controller
{
    public function index()
    {
        $data = AppData::first();
        return view('pages.admin.app-data', compact('data'));
    }

    public function updatePhone(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['app_phone' => $request->app_phone],
        );
        return redirect()->back()->with('status', 'phone-updated');
    }

    public function updateEmail(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['app_email' => $request->app_email],
        );
        return redirect()->back()->with('status', 'email-updated');
    }

    public function updateOrganization(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['organization' => $request->organization],
        );
        return redirect()->back()->with('status', 'organization-updated');
    }

    public function updateINN(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['inn' => $request->inn],
        );
        return redirect()->back()->with('status', 'inn-updated');
    }

    public function updateOGRN(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['ogrn' => $request->ogrn],
        );
        return redirect()->back()->with('status', 'ogrn-updated');
    }

    public function updateOKATO(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['okato' => $request->okato],
        );
        return redirect()->back()->with('status', 'okato-updated');
    }

    public function updateOKPO(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['okpo' => $request->okpo],
        );
        return redirect()->back()->with('status', 'okpo-updated');
    }

    public function updateBank(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['bank' => $request->bank],
        );
        return redirect()->back()->with('status', 'bank-updated');
    }

    public function updateBIK(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['bik' => $request->bik],
        );
        return redirect()->back()->with('status', 'bik-updated');
    }

    public function updateK_s(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['k_s' => $request->k_s],
        );
        return redirect()->back()->with('status', 'k_s-updated');
    }

    public function updateR_s(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['r_s' => $request->r_s],
        );
        return redirect()->back()->with('status', 'r_s-updated');
    }

    public function updateAdress(Request $request)
    {
        AppData::updateOrCreate(
            ['id' => 1],
            ['adress' => $request->adress],
        );
        return redirect()->back()->with('status', 'adress-updated');
    }
}
