@extends('layouts.login')

@section('title', '| Восстановление пароля')

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
                <p class="login-box-msg">Придумайте новый пароль</p>

                <form action="{{ route('password.update') }}" method="POST" id="quickForm">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->token }}">

                    <div class="input-group form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ $request->email }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group form-group mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group form-group mb-3">
                        <input type="password" class="form-control" placeholder="Повторить пароль"
                            name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                    },
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
                    email: {
                        required: "Укажите адрес электронной почты",
                    },
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
                    element.closest('.form-group').append(error);
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
