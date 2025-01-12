@extends('layouts.admin')

@section('title', '| Список заказов')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
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
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-sm">
                            <thead>
                                <tr>
                                    <th>Номер заказа</th>
                                    <th>Покупатель</th>
                                    <th>Телефон</th>
                                    <th>Стоимость заказа</th>
                                    <th>Статус</th>
                                    <th></th>
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
                                            {{ $order->total_amount }} &#8381;
                                        </td>
                                        <td>
                                            <span class="badge badge-success">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('order.edit', $order->id) }}"
                                                    class="btn btn-info btn-xs btn-xs goods-popover" id=""
                                                    data-content="Редактировать" target="_blank">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <button class="btn btn-danger btn-xs btn-xs goods-popover" id=""
                                                    data-toggle="modal" data-target="#modalDelete"
                                                    data-product="{{ $order }}" data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.goods.delete-product-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        // $('.goods-popover').popover({
        //     placement: 'top',
        //     trigger: 'hover',
        // });

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const product = button.data('product');

            const modal = $(this);
            modal.find('.modal-title').text('Удаление артикула: ' + product['sku']);
            modal.find('.modal-text').text('Удалить «' + product['title'] + '»?');
            modal.find('.modal-id').attr('value', product['id']);
        });
    </script>
@endsection
