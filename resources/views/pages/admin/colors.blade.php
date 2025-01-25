@extends('layouts.admin')

@section('title', '| Цвета')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }

        .square-color {
            display: block;
            width: 50px;
            height: 30px;
            border: 1px solid #C0C0C0;
            border-radius: 8px;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Цвета</h1>
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
                    @include('components.admin.color.add-color-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($colors[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Цвета не созданы</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Цвет</th>
                                    <th style="width: auto">HEX код цвета</th>
                                    <th style="width: auto">Образец</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $key => $color)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $color->title }}</td>
                                        <td>#{{ $color->code }}</td>
                                        <td>
                                            <span class="square-color" style="background-color: #{{ $color->code }}">
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.color.edit-color-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-color="{{ $color }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.color.delete-color-modal')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('[data-toggle="modal"]').popover({
            placement: 'top',
            trigger: 'hover',
        });

        $('#modalEdit').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const color = button.data('color');

            const modal = $(this);
            modal.find('.modal-title').attr('value', color['title']);
            modal.find('.modal-code').attr('value', color['code']);
            modal.find('.modal-id').attr('value', color['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const color = button.data('color');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + color['title'] + '»?')
            modal.find('.modal-id').attr('value', color['id']);
        })
    </script>
@endsection
