@extends('layouts.mail')

@section('title', 'Подтверждение адреса электронной почты')

@section('content')
    <h1>Здравствуйте, {{ $user->name }}!</h1>
    <p>Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить свой адрес электронной почты.</p>
    <a href="{{ $verificationUrl }}" class="button">Подтвердите адрес электронной почты</a>
    <p>Если вы не создавали учетную запись, никаких дальнейших действий не требуется.</p>
    <div class="footer">© {{ date('Y') }} {{ config('app.name') }}.</div>
@endsection
