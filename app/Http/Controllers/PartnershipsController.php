<?php

namespace App\Http\Controllers;

use App\Mail\NewPartnershipNotification;
use App\Mail\PartnershipConfirmation;
use App\Models\Partnership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PartnershipsController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        $calls = Partnership::query()->orderBy($sortField, $sortDirection)->paginate(50);

        return view('pages.admin.calls', [
            'calls' => $calls,
            'search' => $calls,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $orderDate = Carbon::now('Europe/Moscow');

        $call = Partnership::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => $orderDate,
            'updated_at' => $orderDate,
        ]);

        try {
            // Отправляем письмо клиенту
            if ($call->email) {
                Mail::to($call->email)
                    ->send(new PartnershipConfirmation($call));
            }

            // Отправляем письмо администратору
            $adminEmail = config('mail.admin_email');
            if ($adminEmail) {
                Mail::to($adminEmail)
                    ->send(new NewPartnershipNotification($call));
            }
        } catch (\Exception $e) {
            Log::error('Ошибка отправки email: ' . $e->getMessage());
        }

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'string'],
        ]);
        Partnership::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
