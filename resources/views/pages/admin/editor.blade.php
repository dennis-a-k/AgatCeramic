@extends('layouts.admin')

@section('title', '| Массовое редактирование товаров')

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
                    <h1 class="m-0 text-info">Массовое редактирование</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card card-purple">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        Редактирование товаров
                    </h4>
                </div>

                <div class="card-body row">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col-md-auto">
                        <a href="{{ route('editor.export', 'goods') }}" class="btn btn-default" download>
                            <i class="fas fa-download"></i> Скачать Excel шаблон
                        </a>
                    </div>

                    <div class="col-md">
                        <form method="POST" action="{{ route('editor.import.goods') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept=".xls, .xlsx "
                                        name="fileExcel" required>
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузить шаблон товаров
                                    </label>
                                    {{--
                                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    @if (session('status') === 'editorGoods-loaded')
                                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
                                    @endif

                                    <button type="submit" class="btn btn-info float-right">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        Редактирование цен
                    </h4>
                </div>

                <div class="card-body row">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col-md-auto">
                        <a href="{{ route('editor.export', 'price') }}" class="btn btn-default">
                            <i class="fas fa-download"></i> Скачать Excel шаблон
                        </a>
                    </div>

                    <div class="col-md">
                        <form method="POST" action="{{ route('editor.import.prices') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept=".xls, .xlsx "
                                        name="fileExcel" required>
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите шаблон цен
                                    </label>
                                    {{--
                                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    @if (session('status') === 'editorPrices-loaded')
                                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
                                    @endif

                                    <button type="submit" class="btn btn-info float-right">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card card-success">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        Редактирование статусов
                    </h4>
                </div>

                <div class="card-body row">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col-md-auto">
                        <a href="{{ route('editor.export', 'status') }}" class="btn btn-default" download>
                            <i class="fas fa-download"></i> Скачать Excel шаблон
                        </a>
                    </div>

                    <div class="col-md">
                        <form method="POST" action="{{ route('editor.import.statuses') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept=".xls, .xlsx "
                                        name="fileExcel" required>
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите шаблон статусов
                                    </label>
                                    {{--
                                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    @if (session('status') === 'editorStatuses-loaded')
                                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
                                    @endif

                                    <button type="submit" class="btn btn-info float-right">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card card-orange">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        Редактирование распродаж
                    </h4>
                </div>

                <div class="card-body row">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="col-md-auto">
                        <a href="{{ route('editor.export', 'sale') }}" class="btn btn-default" download>
                            <i class="fas fa-download"></i> Скачать Excel шаблон
                        </a>
                    </div>

                    <div class="col-md">
                        <form method="POST" action="{{ route('editor.import.sales') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept=".xls, .xlsx " name="fileExcel" required>
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите шаблон распродаж
                                    </label>
                                    {{--
                                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-12">
                                    @if (session('status') === 'editorSales-loaded')
                                        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
                                    @endif

                                    <button type="submit" class="btn btn-info float-right">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            bsCustomFileInput.init();

            $('.select2').select2();
        })
    </script>
@endsection
