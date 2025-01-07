<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Спасибо за заказ!</h1>

    <p>Номер вашего заказа: {{ $order->order_number }}</p>

    <h2>Детали заказа:</h2>
    <table>
        <tr>
            <th>Товар</th>
            <th>Количество</th>
            <th>Цена</th>
        </tr>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product_title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }} &#8381;</td>
            </tr>
        @endforeach
    </table>

    <p><strong>Итого: {{ $order->total_amount }} &#8381;</strong></p>

    <h2>Информация о доставке:</h2>
    <p>{{ $order->shipping_address }}</p>

    <p>Мы свяжемся с вами в ближайшее время для подтверждения заказа.</p>

    <p>С уважением,<br>
        {{ config('app.name') }}</p>
</body>

</html>
