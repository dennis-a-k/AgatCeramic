@extends('layouts.mail')

@section('title')
    Уведомление от {{ config('app.name') }}
@endsection

@section('content')
    <h1>Здравствуйте, {{ $user->name }}!</h1>
    <p>Вас добавили в Админ-панель сайта <strong>{{ config('app.name') }}</strong>.</p>
    <br>
    <p><strong>Ваш логин:</strong> {{ $user->email }}</p>
    <p><strong>Ваш пароль:</strong> {{ $password }}</p>
    <br>
    <p>При входе в Админ-панель, просьба сменить пароль.</p>
    <a href="{{ url('/admin-panel/login') }}" class="button">Войти в Админ-панель</a>
    <br>
    <br>
    <br>
    <div class="footer">© {{ date('Y') }} {{ config('app.name') }}.</div>
@endsection
