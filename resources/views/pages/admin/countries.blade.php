@extends('layouts.admin')

@section('title', '| Страны')

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
                    <h1 class="m-0 text-info">Страны</h1>
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
                    @include('components.admin.country.add-country-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($countries[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Страны не указаны</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Страна</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $key => $country)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.country.edit-country-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete" data-country="{{ $country }}" data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.country.delete-country-modal')
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
            const country = button.data('country');

            const modal = $(this);
            modal.find('.modal-title').attr('value', country['name']);
            modal.find('.modal-id').attr('value', country['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const country = button.data('country');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + country['name'] + '»?')
            modal.find('.modal-id').attr('value', country['id']);
        })
    </script>
@endsection
