@extends('layouts.admin')

@section('title', '| Редактирование товара')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/select2/css/select2.min.css') }}">
    <style>
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
                    <h1 class="m-0 text-info">Редактировать товар <span class="text-black-50">«{{ $product->title }}»</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="POST" action="{{ route('plumbing.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <section class="col-md-6">
                @include('components.admin.goods.plumbing.edit-plumbing-information')
            </section>

            <section class="col-md-6">
                @include('components.admin.goods.plumbing.edit-plumbing-select')
                @include('components.admin.goods.plumbing.edit-plumbing-images')
            </section>

        </div>

        <div class="row pb-4">
            <div class="col-12">
                @if (session('status') === 'product-updated')
                    <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Товар изменён</span>
                @endif
                <button type="submit" class="btn btn-info float-right">Изменить</button>
            </div>
        </div>
    </form>
    <form id="delete-image-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('js')
    <script src="{{ asset('assets/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.images').popover({
                placement: 'bottom',
                content: 'Размер изображения: не более 50Мб и не должен превышать 1200х1200px',
                trigger: 'hover',
            });

            $('.delete-image').popover({
                placement: 'top',
                trigger: 'hover',
            });

            bsCustomFileInput.init();
            $('.select2').select2();

            $('.delete-image').on('click', function(e) {
                e.preventDefault();
                const imageId = $(this).data('image-id');
                const deleteUrl = '{{ route('images.destroy', ':id') }}'.replace(':id', imageId);

                if (confirm('Вы уверены, что хотите удалить это изображение?')) {
                    const form = $('#delete-image-form');
                    form.attr('action', deleteUrl);
                    form.submit();
                }
            });
        });

        $(document).ready(function() {
            function loadSubcategories(categoryId, selectedSubcategoryId = null) {
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
                            let options = '<option value="" disabled>Выберите подкатегорию</option>';
                            data.forEach(function(subcategory) {
                                const selected = selectedSubcategoryId == subcategory.id ? 'selected' : '';
                                options += `<option value="${subcategory.id}" ${selected}>${subcategory.title}</option>`;
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
            }

            $('#selectCategoryPlumbing').change(function() {
                const categoryId = $(this).val();
                loadSubcategories(categoryId);
            });

            const initialCategoryId = $('#selectCategoryPlumbing').val();
            const initialSubcategoryId = '{{ old('subcategory_id', $product->subcategory_id) }}';

            if (initialCategoryId) {
                loadSubcategories(initialCategoryId, initialSubcategoryId);
            }

            $('#selectSubcategoryPlumbing').select2();
        });
    </script>
@endsection
