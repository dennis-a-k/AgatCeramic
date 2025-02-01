@extends('layouts.login')

@section('title', '| Верификация почты')

@section('content')
    <div class="login-box" style="width: 450px">
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
        @elseif (session('status') === 'verification-send')
            <div class="alert alert-success">
                Письмо для подтверждения отправлено на вашу почту: {{ $user->email }}
            </div>
        @endif

        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-box-msg">
                    <p>Привет {{ $user->name }}!</p>
                    <p>
                        Нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.
                    </p>
                </div>

                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block">
                                Подтвердить адрес электронной почты
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
