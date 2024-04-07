@extends('layouts.admin')

@section('title', '| Коллекция')

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
                    <h1 class="m-0">Коллекция</h1>
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
                    @include('components.admin.collection.add-collection-modal')
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-sm">
                        @if (!isset($collections[0]))
                            <thead>
                                <h5 class="text-info text-center mt-2">Коллекции не созданы</h5>
                            </thead>
                        @else
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: auto">Коллекция</th>
                                    <th style="width: 40px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collections as $key => $collection)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $collection->title }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                @include('components.admin.collection.edit-collection-modal')

                                                <button class="btn btn-danger btn-xs" data-toggle="modal"
                                                    data-target="#modalDelete" data-collection="{{ $collection }}"
                                                    data-content="Удалить">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>

                                            @include('components.admin.collection.delete-collection-modal')
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
            const collection = button.data('collection');

            const modal = $(this);
            modal.find('.modal-title').attr('value', collection['title']);
            modal.find('.modal-id').attr('value', collection['id']);
        })

        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const collection = button.data('collection');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить «' + collection['title'] + '»?')
            modal.find('.modal-id').attr('value', collection['id']);
        })
    </script>
@endsection
