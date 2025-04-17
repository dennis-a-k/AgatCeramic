@extends('layouts.admin')

@section('title', '| Заявки перезвонить')

@section('css')
    <style type="text/css">
        .text-dark {
            text-decoration: none;
        }

        .text-dark:hover {
            text-decoration: none;
            color: #666;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Заявки перезвонить</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if (!isset($calls[0]))
                        <h5 class="text-info text-center mt-2">Список заказов пуст</h5>
                    @else
                        <table class="table table-hover text-nowrap table-sm">
                            <thead>
                                <tr>
                                    <th>Покупатель</th>
                                    <th>Телефон</th>
                                    <th>
                                        <a href="{{ route('calls.list', [
                                            'sort' => 'status',
                                            'direction' => $sortField === 'status' && $sortDirection === 'asc' ? 'desc' : 'asc',
                                            'search' => request('search'),
                                        ]) }}"
                                            class="text-dark">
                                            Статус
                                            @if ($sortField === 'status')
                                                <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('calls.list', [
                                            'sort' => 'created_at',
                                            'direction' => $sortField === 'created_at' && $sortDirection === 'asc' ? 'desc' : 'asc',
                                            'search' => request('search'),
                                        ]) }}"
                                            class="text-dark">
                                            Дата заявки
                                            @if ($sortField === 'created_at')
                                                <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calls as $key => $call)
                                    <tr>
                                        <td>
                                            {{ $call->customer_name }}
                                        </td>
                                        <td>
                                            {{ $call->customer_phone }}
                                        </td>
                                        <td>
                                            @include('components.admin.call.pending-calls-modal')
                                        </td>
                                        <td>
                                            {{ $call->created_at->format('H:i -- d.m.Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    <x-admin.pagination.pagination :items="$calls">
                    </x-admin.pagination.pagination>
                </div>
            </div>
        </div>
    </div>
@endsection
