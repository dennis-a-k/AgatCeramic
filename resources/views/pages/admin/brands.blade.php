@extends('layouts.admin')

@section('title', '| Производители')

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
                    <h1 class="m-0 text-info">Производители</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row justify-content-lg-center">
        <div class="col-lg-6">
            <div class="card card-light">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            @include('components.admin.brand.add-brand-modal')
                        </div>

                        <div class="col-6">
                            <div style="float: right;">
                                <x-admin.search.search placeholder="Поиск по бренду" route="{{ route('brands.list') }}"
                                    width="250px">
                                </x-admin.search.search>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($brands[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Производитель не создан</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Производитель</th>
                                    <th style="width: auto">Фото</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td class="align-middle">{{ $key + 1 }}.</td>
                                        <td class="align-middle">{{ $brand->title }}</td>
                                        <td class="align-middle">
                                            @if (!$brand->img)
                                                ---
                                            @else
                                                <img src="{{ URL::asset('storage/brands/' . $brand->img) }}"
                                                    alt="{{ $brand->title }}" height="35px">
                                            @endif

                                        </td>
                                        <td class="align-middle">
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.brand.edit-brand-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-brand="{{ $brand }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.brand.delete-brand-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <x-admin.pagination.pagination :items="$brands">
                    </x-admin.pagination.pagination>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/js/plugins/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript">
        $('[data-toggle="modal"]').popover({
            placement: 'top',
            trigger: 'hover',
        });

        $('#modalEdit').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const brand = button.data('brand');

            const modal = $(this);
            modal.find('.modal-title').attr('value', brand['title']);
            modal.find('.modal-id').attr('value', brand['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const brand = button.data('brand');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + brand['title'] + '»?')
            modal.find('.modal-id').attr('value', brand['id']);
        })

        bsCustomFileInput.init()
    </script>
@endsection
