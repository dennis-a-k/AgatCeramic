@extends('layouts.admin')

@section('title', '| Добавление товара')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">

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
                    <h1 class="m-0 text-info">Добавить новый товар</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12" id="accordion">
            {{-- <div class="card card-info card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                    <div class="card-header">
                        <h4 class="card-title text-info w-100">
                            Обновить базы данных
                        </h4>
                    </div>
                </a>
                <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                    </div>
                </div>
            </div> --}}
            <div class="card card-success card-outline">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                    <div class="card-header">
                        <h4 class="card-title text-success w-100">
                            Добавить шаблоном
                        </h4>
                    </div>
                </a>
                <div id="collapseTwo" class="collapse show" data-parent="#accordion" style="">
                    <div class="card-body row">
                        <div class="col-md-auto">
                            <a href="{{ route('goods.template.export') }}" class="btn btn-default" download>
                                <i class="fas fa-download"></i> Скачать Excel шаблон
                            </a>
                        </div>

                        <div class="col-md">
                            <form method="POST" action="{{ route('goods.import') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept=".xls, .xlsx " name="fileExcel" required>
                                        <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                            Загрузите шаблон Excel
                                        </label>
                                        {{--
                                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                    </div>
                                </div>

                                <div class="row pb-4">
                                    <div class="col-12">
                                        @if (session('status') === 'template-loaded')
                                            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
                                        @endif

                                        <button type="submit" class="btn btn-info float-right">Загрузить</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-purple card-outline">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                    <div class="card-header">
                        <h4 class="card-title text-purple w-100">
                            Добавить товар
                        </h4>
                    </div>
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @include('components.admin.goods.add-product-information')

                                @include('components.admin.goods.add-product-select')
                            </div>

                            <div class="row">
                                @include('components.admin.goods.add-product-images')
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    @if (session('status') === 'product-created')
                                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Товар создан</span>
                                    @endif

                                    <button type="submit" class="btn btn-info float-right">Создать</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('components.admin.goods.add-kleevye_smesi')
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bs-custom-file-input.min.js') }}"></script>

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
