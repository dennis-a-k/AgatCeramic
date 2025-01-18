<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');

        $orders = Order::query()
            ->when($search, function ($query) use ($search) {
                $query->where('order_number', 'LIKE', "%{$search}%")
                    ->orWhere('customer_name', 'LIKE', "%{$search}%")
                    ->orWhere('customer_phone', 'LIKE', "%{$search}%");
            })
            ->orderBy($sortField, $sortDirection)
            ->paginate(50);

        return view('pages.admin.orders', [
            'orders' => $orders,
            'search' => $search,
            'sortField' => $sortField,
            'sortDirection' => $sortDirection
        ]);
    }

    public function order(string $order_number)
    {
        $order = Order::where('order_number', $order_number)->firstOrFail();
        return view('pages.admin.order', compact('order'));
    }

    public function print(string $order_number)
    {
        $order = Order::where('order_number', $order_number)->firstOrFail();
        return view('pages.admin.order-print', compact('order'));
    }

    public function exportToPDF($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Заказ не найден');
        }

        $html = view('pages.admin.order-pdf', compact('order'))->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Скачать PDF
        return $dompdf->stream('Заказ_' . $order->order_number . '.pdf');
    }

    public function success($order_number)
    {
        $successMessage = session('success');

        return view('pages.order-success', compact('order_number', 'successMessage'));
    }
}
