<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Agat Ceramic | {{ $order->order_number }}</title>
        <style>
            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: .6rem;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 1rem;
            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .header {
                margin-bottom: 20px;
            }

            .total {
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <section class="invoice">
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-header">
                            Agat Ceramic
                            <small class="float-right">
                                {{ $order->created_at->format('d.m.Y h:i') }}
                            </small>
                        </h2>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        Продавец:
                        <address>
                            <strong>{{ $appData->organization }}</strong><br>
                            ИНН: {{ $appData->inn }}<br>
                            {{ $appData->adress }}<br>
                            Телефон: {{ $appData->appPhoneFormatted }}<br>
                            Email: {{ $appData->app_email }}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        Покупатель:
                        <address>
                            <strong>{{ $order->customer_name }}</strong><br />
                            {{ $order->shipping_address }}<br />
                            Телефон: {{ $order->customer_phone }}<br />
                            Email: {{ $order->customer_email }}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <b>Заказ № {{ $order->order_number }}</b><br />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Артикул</th>
                                    <th>Товар</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Сумма</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1; @endphp @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $index }})</td>
                                        <td>{{ $item->product_sku }}</td>
                                        <td>{{ $item->product_title }}</td>
                                        <td>
                                            {{ $item->quantity }} @if ($item->unit === 'шт')
                                                шт.
                                            @else
                                                м<sup>2</sup>
                                            @endif
                                        </td>
                                        <td>
                                            {{ number_format($item->price, 2, '.', ' ') }} &#8381;
                                        </td>
                                        <td>
                                            {{ number_format($item->subtotal, 2, '.', ' ') }} &#8381;
                                        </td>
                                    </tr>
                                    @php $index++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="lead">Комментарий к заказу:</p>
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px">
                            {{ $order->comment }}
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="lead">
                            Дата заказа: {{ $order->created_at->format('d.m.Y') }}
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Итого:</th>
                                    <td>
                                        <h3>
                                            <strong>
                                                {{ number_format($order->total_amount, 2, '.', ' ') }}
                                                &#8381;
                                            </strong>
                                        </h3>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
