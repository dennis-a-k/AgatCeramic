@extends('layouts.admin')

@section('title', '| Список товаров')

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
                    <h1 class="m-0">Список товаров</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!isset($goods[0]))
                <h5 class="text-info text-center mt-2">Список товаров пуст</h5>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{ route('goods.list') }}" method="GET">
                                    <div class="input-group input-group-sm" style="width: 500px;">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Поиск по артикулу, наименованию или коду товара"
                                            value="{{ request('search') }}">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            @if (request('search'))
                                                <a href="{{ route('goods.list') }}" class="btn btn-default">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-6">
                                <a href="http://localhost/admin-panel/order-pdf/45" class="btn btn-default float-right"
                                    style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Сохранить в Excel
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-sm">
                            <thead>
                                <tr>
                                    <th>Артикул</th>
                                    <th>Наименование</th>
                                    <th>Код товара</th>
                                    <th>Коллекция</th>
                                    <th>Категория</th>
                                    <th>Цена</th>
                                    <th>ед.изм</th>
                                    <th>Статус</th>
                                    <th>Распродажа</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $key => $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            <a href="{{ route('product.show', $product->sku) }}"
                                                target="_blank">{{ $product->title }}</a>
                                        </td>
                                        <td>
                                            @if (!$product->product_code)
                                                ---
                                            @else
                                                {{ $product->product_code }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$product->collection)
                                                ---
                                            @else
                                                {{ $product->collection->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$product->category)
                                                ---
                                            @else
                                                {{ $product->category->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @include('components.admin.goods.price-product-modal')
                                        </td>
                                        <td>
                                            @if ($product->unit === 'м2')
                                                М<sup>2</sup>
                                            @elseif ($product->unit === 'шт')
                                                шт.
                                            @endif
                                        </td>
                                        <td>
                                            @include('components.admin.goods.published-product-modal')
                                        </td>
                                        <td>
                                            @include('components.admin.goods.sale-product-modal')
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-info btn-xs btn-xs goods-popover" id=""
                                                    data-content="Редактировать" target="_blank">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <button class="btn btn-danger btn-xs btn-xs goods-popover" id=""
                                                    data-toggle="modal" data-target="#modalDelete"
                                                    data-product="{{ $product }}" data-content="Удалить">
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

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item {{ $goods->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ $goods->appends(['search' => request('search')])->url(1) }}">&laquo;</a>
                            </li>

                            @for ($i = 1; $i <= $goods->lastPage(); $i++)
                                <li class="page-item {{ $goods->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $goods->appends(['search' => request('search')])->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item {{ $goods->currentPage() == $goods->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link"
                                    href="{{ $goods->appends(['search' => request('search')])->url($goods->lastPage()) }}">&raquo;</a>
                            </li>
                        </ul>
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
