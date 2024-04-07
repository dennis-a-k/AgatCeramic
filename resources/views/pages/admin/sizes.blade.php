@extends('layouts.admin')

@section('title', '| Размеры')

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
                    <h1 class="m-0">Размеры</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    @include('components.admin.size.add-size-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($sizes[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Размеры не созданы</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Размер</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $key => $size)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $size->title }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.size.edit-size-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-size="{{ $size }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.size.delete-size-modal')
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
            const size = button.data('size');

            const modal = $(this);
            modal.find('.modal-title').attr('value', size['title']);
            modal.find('.modal-id').attr('value', size['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const size = button.data('size');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + size['title'] + '»?')
            modal.find('.modal-id').attr('value', size['id']);
        })
    </script>
@endsection
