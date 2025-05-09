@extends('layouts.admin')

@section('title', '| Категории сантехники')

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
                    <h1 class="m-0 text-info">Категории сантехники</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-light">
                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (empty($santexnika))
                            <thead>
                                <h5 class="text-info text-center mt-2">Категория "Сантехника" не существует</h5>
                            </thead>
                        @elseif (!isset($categories->children[0]))
                            <div class="card-header">
                                @include('components.admin.category.add-category-modal')
                            </div>
                            <thead>
                                <h5 class="text-info text-center mt-2">Категории не созданы</h5>
                            </thead>
                        @else
                            <div class="card-header">
                                @include('components.admin.category.add-category-modal')
                            </div>
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Категория</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories->children as $key => $category)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $key + 1 }}.</td>
                                        <td>
                                            {{ $category->title }}
                                            @if (isset($category->children[0]))
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.category.edit-category-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete" data-category="{{ $category }}" data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.category.delete-category-modal')
                                        </td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td style="width: auto" colspan="3">
                                            <div class="p-0" style="display: none;">
                                                <table class="table table-hover m-0">
                                                    <tbody>
                                                        @foreach ($category->children as $k => $child)
                                                            <tr>
                                                                <td style="width: 10px">{{ $key + 1 }}.{{ $k + 1 }}</td>
                                                                <td style="width: auto">{{ $child->title }}</td>
                                                                <td style="width: 40px">
                                                                    <div class="btn-group btn-group-xs">
                                                                        @include('components.admin.category.edit-category-modal', ['category' => $child, 'level' => 0])

                                                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete" data-category="{{ $child }}"
                                                                            data-content="Удалить">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>

                                                                    @include('components.admin.category.delete-category-modal')
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        @include('components.admin.category.select-category')
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

        $('[data-toggle="modal"]').popover({
            placement: 'top',
            trigger: 'hover',
        });

        $('#modalEdit').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const category = button.data('category');

            const modal = $(this);
            modal.find('.modal-title').attr('value', category['title']);
            modal.find('.modal-id').attr('value', category['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const category = button.data('category');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + category['title'] + '»?')
            modal.find('.modal-id').attr('value', category['id']);
        })
    </script>
@endsection
