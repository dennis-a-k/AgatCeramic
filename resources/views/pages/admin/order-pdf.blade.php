<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agat Ceramic | {{ $order->order_number }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
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

        /* body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }

        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        h2 {
            font-size: 2rem;
            font-weight: bold;
            unicode-bidi: isolate;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .float-right {
            float: right !important;
        }

        .col-sm-4 {
            -ms-flex: 0 0 30%;
            flex: 0 0 30%;
            max-width: 30%;
            width: 100%;
            padding-right: 7.5px;
            padding-left: 7.5px;
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        thead {
            display: table-header-group;
            vertical-align: middle;
            unicode-bidi: isolate;
            border-color: inherit;
        }

        tr {
            display: table-row;
            vertical-align: inherit;
            unicode-bidi: isolate;
            border-color: inherit;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
            width: 100%;
            padding-right: 7.5px;
            padding-left: 7.5px;
        } */

        /* .table th,
      .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      } */
        /* .lead {
            font-size: 1.25rem;
            font-weight: 300;
        }

        .text-muted {
            margin-top: 10px;
            color: #6c757d !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .header {
            margin-bottom: 20px;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        } */

        /* .total {
        margin-top: 20px;
      } */
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
                        <strong>ИП ООООО</strong><br />
                        Москва<br />
                        улица<br />
                        Телефон: +7 (999) 999-99-99<br />
                        Email: zakaz@agatceramic.ru
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
                    <table class="table table-striped">
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
