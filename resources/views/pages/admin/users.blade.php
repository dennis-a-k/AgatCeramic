@extends('layouts.admin')

@section('title', '| Пользователи')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Пользователи</h1>
                </div>
            </div>
        </div>
    </div>

    @if (session('status') === 'verification-send')
        <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="d-block text-sm text-info text-center mb-3">
            Ссылка для подтверждения отправлена!
        </span>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!isset($users[0]))
                <h5 class="text-info text-center mt-2">Список пользователей пуст</h5>
            @else
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Имя</th>
                                    <th>Почта</th>
                                    <th>Роль</th>
                                    <th>Верификация</th>
                                    <th>Регистрация</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>
                                            @if ($user->role === 'admin')
                                                <i class="fas fa-user-circle text-warning"></i>
                                            @else
                                                <i class="fas fa-user-circle text-info"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @if (auth()->id() === $user->id)
                                                @if ($user->role === 'admin')
                                                    <span class="btn btn-outline-warning btn-xs disabled">
                                                        Администратор
                                                    </span>
                                                @else
                                                    <span class="btn btn-block btn-outline-info btn-xs disabled">
                                                        Пользователь
                                                    </span>
                                                @endif
                                            @else
                                                @include('components.admin.user.role')
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->email_verified_at === null)
                                                <span class="btn btn-secondary btn-xs disabled">
                                                    Пользователь не подтвердил почту
                                                </span>
                                            @else
                                                {{ $user->email_verified_at->format('d.m.Y') }}
                                            @endif

                                        </td>
                                        <td>
                                            {{ $user->created_at->format('d.m.Y') }}
                                        </td>
                                        <td class="text-right">
                                            @if (auth()->id() !== $user->id)
                                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete" data-user="{{ $user }}">
                                                    <i class="fas fa-trash"></i>
                                                    Удалить
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                @include('components.admin.user.modal')
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#modalDelete').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const user = button.data('user');

            const modal = $(this);
            modal.find('.modal-text').text('Удалить ' + user['name'] + '?');
        });
    </script>
@endsection
