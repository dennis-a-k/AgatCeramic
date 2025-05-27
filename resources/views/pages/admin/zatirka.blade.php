@extends('layouts.admin')

@section('title', '| Тип затирки')

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
                    <h1 class="m-0 text-info">Тип затирки</h1>
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
                    @include('components.admin.zatirka.add-zatirka-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($categories->children[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Типы затирки не созданы</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Тип затирки</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories->children as $key => $child)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $child->title }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.zatirka.edit-zatirka-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete" data-child="{{ $child }}" data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.zatirka.delete-zatirka-modal')
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
            const child = button.data('child');

            const modal = $(this);
            modal.find('.modal-title').attr('value', child['title']);
            modal.find('.modal-id').attr('value', child['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const child = button.data('child');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + child['title'] + '»?')
            modal.find('.modal-id').attr('value', child['id']);
        })
    </script>
@endsection
