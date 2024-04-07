@extends('layouts.admin')

@section('title', '| Узор')

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
                    <h1 class="m-0">Узор</h1>
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
                    @include('components.admin.pattern.add-pattern-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($patterns[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Узоры не созданы</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Узор</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patterns as $key => $pattern)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $pattern->title }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.pattern.edit-pattern-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-pattern="{{ $pattern }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.pattern.delete-pattern-modal')
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
            const pattern = button.data('pattern');

            const modal = $(this);
            modal.find('.modal-title').attr('value', pattern['title']);
            modal.find('.modal-id').attr('value', pattern['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const pattern = button.data('pattern');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + pattern['title'] + '»?')
            modal.find('.modal-id').attr('value', pattern['id']);
        })
    </script>
@endsection
