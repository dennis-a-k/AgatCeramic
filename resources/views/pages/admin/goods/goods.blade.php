@extends('layouts.admin')

@section('title', '| Список товаров')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }

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
                    <h1 class="m-0 text-info">Список товаров</h1>
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
                                <x-admin.search.search placeholder="Поиск по артикулу, наименованию или коду товара" route="{{ route('goods.list') }}" width="500px">
                                </x-admin.search.search>
                            </div>

                            <div class="col-6">
                                <a href="{{ route('goods.export') }}" class="btn btn-default float-right" style="margin-right: 5px;">
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
                                    <th>Категория</th>
                                    <th>Цена</th>
                                    <th>ед.изм</th>
                                    <th>
                                        <a href="{{ route('goods.list', [
                                            'sort' => 'is_published',
                                            'direction' => $sortField === 'is_published' && $sortDirection === 'asc' ? 'desc' : 'asc',
                                            'search' => request('search'),
                                        ]) }}"
                                            class="text-dark">
                                            Статус
                                            @if ($sortField === 'is_published')
                                                <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('goods.list', [
                                            'sort' => 'sale',
                                            'direction' => $sortField === 'sale' && $sortDirection === 'asc' ? 'desc' : 'asc',
                                            'search' => request('search'),
                                        ]) }}"
                                            class="text-dark">
                                            Распродажа
                                            @if ($sortField === 'sale')
                                                <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $key => $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            <a href="{{ route('product.show', [
                                                'category' => $product->category->slug,
                                                'slug' => $product->slug,
                                                'sku' => $product->sku,
                                            ]) }}"
                                                target="_blank" class="title">
                                                {{ Str::words($product->title, 6) }}
                                            </a>
                                        </td>
                                        <td>
                                            @if (!$product->product_code)
                                                ---
                                            @else
                                                {{ $product->product_code }}
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
                                                м<sup>2</sup>
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
                                                @if ($product->category->title === 'Клеевые смеси')
                                                    <a href="{{ route('kleya.edit', $product->id) }}" class="btn btn-info btn-xs btn-xs goods-popover" id="" data-content="Редактировать"
                                                        target="_blank">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-xs btn-xs goods-popover" id="" data-content="Редактировать"
                                                        target="_blank">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endif


                                                <button class="btn btn-danger btn-xs btn-xs goods-popover" id="" data-toggle="modal" data-target="#modalDelete" data-product="{{ $product }}"
                                                    data-content="Удалить">
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
                        <x-admin.pagination.pagination :items="$goods">
                        </x-admin.pagination.pagination>
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
