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
                        @include('components.admin.goods.templates.ceramic')

                        @include('components.admin.goods.templates.kleya')

                        @include('components.admin.goods.templates.zatirka')

                        @include('components.admin.goods.templates.plumbing')
                    </div>
                </div>
            </div>

            @include('components.admin.goods.ceramic.add-product')

            @include('components.admin.goods.kleya.add-kleya')

            @include('components.admin.goods.zatirka.add-zatirka')

            @include('components.admin.goods.plumbing.add-plumbing')
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

        $(document).ready(function() {
            $('#selectCategoryPlumbing').change(function() {
                const categoryId = $(this).val();
                const subcategorySelect = $('#selectSubcategoryPlumbing');
                const wrapper = $('#subcategoryWrapper');

                if (!categoryId) {
                    wrapper.hide();
                    return;
                }

                subcategorySelect.html('<option value="">Загрузка...</option>');
                wrapper.show();

                $.ajax({
                    url: '/api/categories/' + categoryId + '/subcategories',
                    type: 'GET',
                    success: function(data) {
                        if (data.length > 0) {
                            let options = '<option selected disabled>Выберите подкатегорию</option>';
                            data.forEach(function(subcategory) {
                                options += `<option value="${subcategory.id}">${subcategory.title}</option>`;
                            });
                            subcategorySelect.html(options);
                        } else {
                            subcategorySelect.html('<option value="">Нет подкатегорий</option>');
                            wrapper.hide();
                        }
                    },
                    error: function() {
                        subcategorySelect.html('<option value="">Ошибка загрузки</option>');
                    }
                });
            });

            $('#selectSubcategoryPlumbing').select2();
        });
    </script>
@endsection
