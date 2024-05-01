@extends('layouts.admin')

@section('title', '| Редактирование товара')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">

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
                    <h1 class="m-0">Редактировать товар <span class="text-black-50">«{{ $product->title }}»</span></h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @include('components.admin.goods.edit-product-information')

        @include('components.admin.goods.edit-product-select')
    </div>

    <div class="row">
        @include('components.admin.goods.edit-product-images')
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/plugins/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('.images').popover({
                placement: 'bottom',
                content: 'Размер изображения: не более 50Мб и не должен превышать 1200х1200px',
                trigger: 'hover',
            });

            bsCustomFileInput.init();

            $('.select2').select2();
        })
    </script>
@endsection
