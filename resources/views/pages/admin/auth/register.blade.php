@extends('layouts.admin')

@section('title', '| Создание нового пользователя')

@section('css')

@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-info">Создание нового пользователя</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="d-flex justify-content-center mt-5">
    <div class="register-box mt-5">
        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('user.store') }}" method="POST" class="my-4" id="quickForm">
                    @csrf

                    <div class="input-group form-group mb-3">
                        <input type="text" class="form-control" placeholder="Полное имя" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
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
                    <div class="input-group form-group mb-5">
                        <input type="password" class="form-control" placeholder="Повторить пароль"
                            name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-info" type="radio"
                                        id="customRadio1" name="role" value="admin">
                                    <label for="customRadio1" class="custom-control-label">Администратор</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-info" type="radio"
                                        id="customRadio2" name="role" value="moderator" checked>
                                    <label for="customRadio2" class="custom-control-label">Модератор</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-info btn-block">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
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
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
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
                    name: {
                        required: "Укажите имя пользователя",
                    },
                    email: {
                        required: "Укажите адрес электронной почты",
                        email: "Пользователь с такой почтой уже есть",
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
