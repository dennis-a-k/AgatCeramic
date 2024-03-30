@extends('layouts.admin')

@section('title', '| Список товаров')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }
    </style>

    <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/plugins/jsgrid/jsgrid.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/plugins/jsgrid/jsgrid-theme.min.css') }}">
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
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Артикул</th>
                                    <th style="width: auto">Наименование</th>
                                    <th>Серия</th>
                                    <th>Остаток</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($goods as $key => $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            <a href="#" target="_blank">{{ $product->title }}</a>
                                        </td>
                                        {{-- <td>{{ $product->category->title }}</td>
                                        <td>
                                            @include('components.goods.count-product-modal')
                                        </td>
                                        <td>
                                            @include('components.goods.price-product-modal')
                                        </td>
                                        <td>
                                            @include('components.goods.published-product-modal')
                                        </td> --}}
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('admin.dashboard', $product->id) }}"
                                                    class="btn btn-info btn-xs btn-msg" data-content="Редактировать">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <button class="btn btn-danger btn-xs btn-msg" data-toggle="modal"
                                                    data-target="#modalDelete" data-product="{{ $product }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            {{-- @include('components.goods.delete-product-modal') --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div id="jsGrid1"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/adminlte/plugins/jsgrid/demos/db.js') }}"></script>
    <script src="{{ URL::asset('assets/adminlte/plugins/jsgrid/jsgrid.js') }}"></script>

    <script type="text/javascript">
        //всплывающие подсказки над кнопками
        $('.btn-msg').popover({
            placement: 'top',
            trigger: 'hover',
        });

        //модалка для удаления категории
        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const product = button.data('product');

            const modal = $(this);
            modal.find('.modal-title').text('Удаление товара арт: ' + product['article']);
            modal.find('.modal-text').text('Удалить ' + product['title'] + '?');
            modal.find('.modal-id').attr('value', product['id']);
        });

        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: db.clients,

            fields: [{
                    name: "Name",
                    type: "text",
                    width: 150
                },
                {
                    name: "Age",
                    type: "number",
                    width: 50
                },
                {
                    name: "Address",
                    type: "text",
                    width: 200
                },
                {
                    name: "Country",
                    type: "select",
                    items: db.countries,
                    valueField: "Id",
                    textField: "Name"
                },
                {
                    name: "Married",
                    type: "checkbox",
                    title: "Is Married"
                }
            ]
        });
    </script>
@endsection
