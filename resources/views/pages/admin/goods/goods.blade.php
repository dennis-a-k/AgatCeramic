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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $key => $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            <a href="#" target="_blank">{{ $product->title }}</a>
                                        </td>
                                        <td>{{ $product->product_code }}</td>
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
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('product.edit', $product->id) }}"
                                                    class="btn btn-info btn-xs btn-xs" data-content="Редактировать"
                                                    target="_blank">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <button class="btn btn-danger btn-xs btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-product="{{ $product }}"
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
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('.btn-xs').popover({
            placement: 'top',
            trigger: 'hover',
        });

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
