<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение заказа</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #000;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #788da3;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #788da3;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-table th,
        .order-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #788da3;
        }

        .order-table th {
            background-color: #788da3;
            color: #ffffff;
            font-weight: 600;
        }

        .order-summary {
            margin-top: 20px;
            text-align: right;
            font-size: 16px;
            font-weight: 600;
        }

        .footer {
            background-color: #eef1f5;
            color: #000;
            padding: 15px;
            text-align: center;
            font-size: 14px;
        }

        .footer a {
            color: #788da3;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
        </div>
        <div class="content">
            <h2>Здравствуйте, {{ $order->customer_name }}!</h2>
            <p>Благодарим вас за покупку в нашем интернет-магазине.<br>
                Мы рады подтвердить ваш заказ № <strong>{{ $order->order_number }}</strong>.
            </p>

            <h2>Детали заказа:</h2>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Артикул</th>
                        <th>Наименование</th>
                        <th>Количество</th>
                        <th>Цена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_sku }}</td>
                            <td>{{ $item->product_title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} &#8381;</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="order-summary">
                <strong>Итоговая сумма: {{ $order->total_amount }} &#8381;</strong>
            </div>

            <h2>Информация о доставке:</h2>
            <p><strong>Телефон: </strong>{{ $order->customer_phone }}</p>
            <p><strong>Адрес: </strong>{{ $order->shipping_address }}</p>
            @if ($order->comment)
                <p>
                    <strong>Комментарий к заказу: </strong>
                    {{ $order->comment }}
                </p>
            @endif

        </div>
        <div class="footer">
            <h2>Мы свяжемся с вами в ближайшее время для подтверждения заказа.</h2>
            <p>Если у вас возникли вопросы, свяжитесь с нами:</p>
            <p>Email: <a href="mailto:zakaz@agatceramic.com">zakaz@agatceramic.com</a> | Телефон: <a
                    href="tel:79999999999">+7 (XXX) XXX-XX-XX</a>
            </p>
            <p>Спасибо, что выбрали {{ config('app.name') }}!</p>
        </div>
    </div>
</body>

</html>
