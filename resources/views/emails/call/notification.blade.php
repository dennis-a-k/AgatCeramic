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
    <h1>Новая заявка на звонок!</h1>

    <h2>Информация о клиенте:</h2>
    <ul>
        <li><strong>Имя:</strong> {{ $call->customer_name }}</li>
        <li><strong>Телефон:</strong> {{ $call->customer_phone }}</li>
        <li><strong>Время:</strong> {{ $call->created_at->format('H:i') }}</li>
        <li><strong>Дата:</strong> {{ $call->created_at->format('d.m.Y') }}</li>
    </ul>

    <p>С уважением,<br>
        {{ config('app.name') }}</p>
</body>

</html>
