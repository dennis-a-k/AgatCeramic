<?php

namespace App\Http\Controllers;

use App\Mail\NewCallNotification;
use App\Models\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CallController extends Controller
{
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        $calls = Call::query()->orderBy($sortField, $sortDirection)->paginate(50);

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
            'customer_name' => 'required',
            'customer_phone' => 'required',
        ]);

        $orderDate = Carbon::now('Europe/Moscow');

        $call = Call::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'created_at' => $orderDate,
            'updated_at' => $orderDate,
        ]);

        try {
            // Отправляем письмо администратору
            $adminEmail = config('mail.admin_email');
            if ($adminEmail) {
                Mail::to($adminEmail)
                    ->send(new NewCallNotification($call));
            }
        } catch (\Exception $e) {
            // Логируем ошибку, но позволяем процессу оформления заказа продолжиться
            Log::error('Ошибка отправки email: ' . $e->getMessage());
        }

        return back()->with('success', 'call-created');
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'string'],
        ]);
        Call::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
