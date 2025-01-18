@extends('layouts.admin')

@section('title', '| Список заказов')

@section('css')
    <style type="text/css">
        .text-dark {
            text-decoration: none;
        }

        .text-dark:hover {
            text-decoration: none;
            color: #666;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Список заказов</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!isset($orders[0]))
                <h5 class="text-info text-center mt-2">Список заказов пуст</h5>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <x-admin.search.search placeholder="Поиск по номеру заказа, ФИО или телефону клиента"
                                    route="{{ route('orders.list') }}" width="500px">
                                </x-admin.search.search>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-sm">
                            <thead>
                                <tr>
                                    <th>Номер заказа</th>
                                    <th>Покупатель</th>
                                    <th>Телефон</th>
                                    <th>Стоимость заказа</th>
                                    <th>
                                        <a href="{{ route('orders.list', [
                                            'sort' => 'status',
                                            'direction' => $sortField === 'status' && $sortDirection === 'asc' ? 'desc' : 'asc',
                                            'search' => request('search'),
                                        ]) }}"
                                            class="text-dark">
                                            Статус
                                            @if ($sortField === 'status')
                                                <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>Дата заказа</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('order.show', $order->order_number) }}" target="_blank">
                                                {{ $order->order_number }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $order->customer_name }}
                                        </td>
                                        <td>
                                            {{ $order->customer_phone }}
                                        </td>
                                        <td>
                                            {{ number_format($order->total_amount, 2, '.', ' ') }} &#8381;
                                        </td>
                                        <td>
                                            @if ($order->status === 'pending')
                                                <span class="badge badge-warning">
                                                    новый заказ
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">
                                                    просмотрен
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('H:i d.m.Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <x-admin.pagination.pagination :items="$orders">
                        </x-admin.pagination.pagination>
                    </div>
            @endif
        </div>
    </div>
@endsection
