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
    <h1>Новая заявка от дизайнера!</h1>

    <h2>Информация о партнёре:</h2>
    <ul>
        <li><strong>Имя:</strong> {{ $call->name }}</li>
        <li><strong>Телефон:</strong> {{ $call->phone }}</li>
        <li><strong>Почта:</strong> {{ $call->email }}</li>
        <li><strong>Время:</strong> {{ $call->created_at->format('H:i') }}</li>
        <li><strong>Дата:</strong> {{ $call->created_at->format('d.m.Y') }}</li>
    </ul>

    <p>С уважением,<br>
        {{ config('app.name') }}</p>
</body>

</html>
