@extends('layouts.login')

@section('title', '| Авторизация')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home') }}" target="_blank"><b>Agat Ceramic</b></a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Авторизируйтесь в админ-панели</p>

                <form action="{{ route('login.store') }}" method="POST" id="quickForm">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-info">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-info btn-block">Войти</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#" class="text-info">Восстановить пароль</a>
                </p>
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
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Укажите адрес электронной почты",
                    },
                    password: {
                        required: "Укажите пароль",
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
