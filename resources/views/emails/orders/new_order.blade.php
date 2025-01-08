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
    <h1>Новый заказ!</h1>

    <p>Получен новый заказ № {{ $order->order_number }}</p>

    <h2>Информация о клиенте:</h2>
    <ul>
        <li><strong>Имя:</strong> {{ $order->customer_name }}</li>
        <li><strong>Email:</strong> {{ $order->customer_email }}</li>
        <li><strong>Телефон:</strong> {{ $order->customer_phone }}</li>
        <li><strong>Адрес доставки:</strong> {{ $order->shipping_address }}</li>
    </ul>

    @if ($order->comment)
        <p><strong>Комментарий к заказу:</strong><br>
            {{ $order->comment }}</p>
    @endif

    <h2>Детали заказа:</h2>
    <table>
        <tr>
            <th>Товар</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product_title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }} &#8381;</td>
                <td>{{ $item->subtotal }} &#8381;</td>
            </tr>
        @endforeach
    </table>

    <p><strong>Итого: {{ $order->total_amount }} &#8381;</strong></p>

    <p>С уважением,<br>
        {{ config('app.name') }}</p>
</body>

</html>
