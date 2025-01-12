@extends('layouts.admin')

@section('title')
    | {{ $order->order_number }}
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Заказ № {{ $order->order_number }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            Agat Ceramic
                                            <small class="float-right">
                                                {{ $order->created_at->format('d.m.Y h:i') }}
                                            </small>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Продавец:
                                        <address>
                                            <strong>ИП ООООО</strong><br>
                                            Москва<br>
                                            улица<br>
                                            Телефон: +7 (999) 999-99-99<br>
                                            Email: zakaz@agatceramic.ru
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        Покупатель:
                                        <address>
                                            <strong>{{ $order->customer_name }}</strong><br>
                                            {{ $order->shipping_address }}<br>
                                            Телефон: {{ $order->customer_phone }}<br>
                                            Email: {{ $order->customer_email }}
                                        </address>
                                    </div>
                                    <div class="col-sm-4 invoice-col">
                                        <b>Заказ № {{ $order->order_number }}</b><br>
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
                                                @php $index = 1; @endphp
                                                @foreach ($order->items as $item)
                                                    <tr>
                                                        <td>{{ $index }})</td>
                                                        <td>{{ $item->product_sku }}</td>
                                                        <td>{{ $item->product_title }}</td>
                                                        <td>{{ $item->quantity }}
                                                            @if ($item->unit === 'шт')
                                                                шт.
                                                            @else
                                                                м<sup>2</sup>
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($item->price, 2, '.', ' ') }} &#8381;</td>
                                                        <td>{{ number_format($item->subtotal, 2, '.', ' ') }} &#8381;</td>
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
                                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                            {{ $order->comment }}
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p class="lead">Дата заказа: {{ $order->created_at->format('d.m.Y') }}</p>

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

                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="{{ route('order.print', $order->order_number) }}" rel="noopener"
                                            target="_blank" class="btn btn-default">
                                            <i class="fas fa-print"></i>
                                            Распечатать
                                        </a>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Сохранить в PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
