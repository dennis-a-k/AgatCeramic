@extends('layouts.admin')

@section('title')
    | {{ $user->name }}
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">{{ $user->name }}</h1>
                    <h3 class="m-0 text-secondary">{{ $user->email }}</h3>
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
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('profile.update.name', $user->id) }}" method="POST" class="form-horizontal" id="quickFormName">
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

                <form action="{{ route('profile.update.email', $user->id) }}" method="POST" class="form-horizontal" id="quickFormEmail">
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

                <form action="{{ route('profile.update.password', $user->id) }}" method="POST" class="my-4" id="quickFormPassword">
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
@endsection

@section('js')
    <!-- jquery-validation -->
    <script src="{{ asset('assets/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script>
        $(function() {
            $('#quickFormName').validate({
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Укажите имя пользователя",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function() {
            $('#quickFormEmail').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    email: {
                        required: "Укажите адрес электронной почты",
                        email: "Пользователь с такой почтой уже есть",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        $(function() {
            $('#quickFormPassword').validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "input[name='password']",
                    },
                },
                messages: {
                    password: {
                        required: "Придумайте пароль",
                        minlength: "Длина пароля не менее 6 символов",
                    },
                    password_confirmation: {
                        required: "Подтвердите пароль",
                        equalTo: "Пароли не совпадают",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
