@extends('layouts.admin')

@section('title', '| Данные сайта')

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
                    <h1 class="m-0 text-info">Данные сайта</h1>
                </div>
            </div>
        </div>
    </div>

    @if (session('status') === 'username-updated')
        <div class="alert alert-success">
            Имя успешно обновлено
        </div>
    @elseif (session('status') === 'email-updated')
        <div class="alert alert-success">
            Почта успешно обновлена
        </div>
    @elseif (session('status') === 'password-updated')
        <div class="alert alert-success">
            Пароль успешно обновлён
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-5">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td class="text-secondary"><strong>Телефон:</strong></td>
                        <td>
                            @if (!isset($data->app_phone))
                                ---
                            @else
                                {{ $data->app_phone }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>Почта:</strong></td>
                        <td>
                            @if (!isset($data->app_email))
                                ---
                            @else
                                {{ $data->app_email }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>Организация:</strong></td>
                        <td>
                            @if (!isset($data->organization))
                                ---
                            @else
                                {{ $data->organization }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>ИНН:</strong></td>
                        <td>
                            @if (!isset($data->inn))
                                ---
                            @else
                                {{ $data->inn }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>ОГРН:</strong></td>
                        <td>
                            @if (!isset($data->ogrn))
                                ---
                            @else
                                {{ $data->ogrn }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>ОКАТО:</strong></td>
                        <td>
                            @if (!isset($data->okato))
                                ---
                            @else
                                {{ $data->okato }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>ОКПО:</strong></td>
                        <td>
                            @if (!isset($data->okpo))
                                ---
                            @else
                                {{ $data->okpo }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>Банк:</strong></td>
                        <td>
                            @if (!isset($data->bank))
                                ---
                            @else
                                {{ $data->bank }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>БИК Банка:</strong></td>
                        <td>
                            @if (!isset($data->bik))
                                ---
                            @else
                                {{ $data->bik }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>к/с:</strong></td>
                        <td>
                            @if (!isset($data->k_s))
                                ---
                            @else
                                {{ $data->k_s }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>р/с:</strong></td>
                        <td>
                            @if (!isset($data->r_s))
                                ---
                            @else
                                {{ $data->r_s }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary"><strong>Адрес:</strong></td>
                        <td>
                            @if (!isset($data->adress))
                                ---
                            @else
                                {{ $data->adress }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body register-card-body">
                    <form action="" method="POST" class="form-horizontal" id="quickFormName">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputName" class="col-md-3 col-form-label">Изменить имя</label>
                            <div class="col-md-9 input-group">
                                <input type="text" class="form-control" id="inputName" placeholder="Полное имя" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info">Изменить</button>
                                </span>
                            </div>
                        </div>
                    </form>

                    <form action="" method="POST" class="form-horizontal" id="quickFormEmail">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputEmail" class="col-md-3 col-form-label">Изменить почту</label>
                            <div class="col-md-9 input-group">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info">Изменить</button>
                                </span>
                            </div>
                        </div>
                    </form>

                    <form action="" method="POST" class="my-4" id="quickFormPassword">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Изменить пароль</label>
                            <div class="col-md-9 input-group">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Новый пароль" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPasswordComf" class="col-md-3 col-form-label">Подтвердить пароль</label>
                            <div class="col-md-9 input-group">
                                <input type="password" class="form-control" id="inputPasswordComf" placeholder="Повторить пароль" name="password_confirmation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-info btn-block">Изменить пароль</button>
                            </div>
                        </div>
                    </form>
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
