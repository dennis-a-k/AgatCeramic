@extends('layouts.main')

@section('title', '404 - Страница не найдена')

@section('content')
<div class="error-container">
    <div class="error-content">
        <h1>404</h1>
        <h2>Упс! Страница не найдена</h2>
        <p>К сожалению, запрашиваемая страница не существует.</p>
        <div class="error-actions d-flex justify-content-center">
            <a href="javascript:history.back()" class="btn">
                <i class="fa fa-arrow-left"></i>&nbsp;Назад
            </a>
            <a href="{{ route('home') }}" class="btn">
                <i class="fa fa-home"></i>&nbsp;На главную
            </a>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .error-container {
        text-align: center;
        padding: 40px 15px;
    }

    .error-content {
        max-width: 600px;
        margin: 0 auto;
    }

    .error-content h1 {
        font-size: 120px;
        margin-bottom: 20px;
    }

    .error-content h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .error-actions {
        margin-top: 30px;
    }

    .error-actions .btn {
        margin: 0 10px;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .error-actions .btn:hover {
        color: #fff;
        transform: translateY(-1px);
        background-color: #788da3;
        border-color: #788da3;
    }
</style>
@endsection