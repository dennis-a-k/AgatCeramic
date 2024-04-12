@extends('layouts.admin')

@section('title', '| Добавление товара')

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
                    <h1 class="m-0">Добавить новый товар</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('components.admin.goods.add-product-information')

            @include('components.admin.goods.add-product-select')
            {{-- @include('components.goods.add-product-images') --}}
        </div>

        <div class="row pb-4">
            <div class="col-12">
                @if (session('status') === 'product-created')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-info text-align-center mr-2">Товар создан</span>
                @endif

                <button type="submit" class="btn btn-info float-right">Создать</button>
            </div>
        </div>
    </form>
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
