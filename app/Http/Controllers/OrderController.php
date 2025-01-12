<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.orders', compact('orders'));
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
