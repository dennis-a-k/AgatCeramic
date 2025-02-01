@extends('layouts.mail')

@section('title', 'Сброс пароля')

@section('content')
    <h1>Здравствуйте, {{ $user->name }}!</h1>
    <p>Вы запросили сброс пароля.</p>
    <p>Для сброса пароля нажмите на кнопку ниже:</p>
    <a href="{{ $resetLink }}" class="button">Сбросить пароль</a>
    <p>
        Срок действия ссылки истекает через {{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }} минут.
    </p>
    <p>Если вы не запрашивали сброс пароля, никаких дальнейших действий не требуется.</p>
    <br>
    <p>
        Если у вас возникли проблемы с нажатием кнопки «Сбросить пароль», скопируйте и вставьте указанный ниже URL-адрес в адресную строку вашего веб-браузера:
        <a href="{{ $resetLink }}" style="color: #15c">{{ $resetLink }}</a>
    </p>
    <br>
    <br>
    <br>
    <div class="footer">© {{ date('Y') }} {{ config('app.name') }}.</div>
@endsection
