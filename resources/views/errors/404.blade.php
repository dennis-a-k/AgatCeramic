@extends('layouts.main')

@section('title', '404 - Страница не найдена')

@section('content')
    <div class="section-404 section" data-bg-image="assets/images/404/bg-404.webp">
        <div class="container">
            <div class="content-404">
                <h1 class="title">404</h1>
                <h2 class="sub-title">Упс! Страница не найдена</h2>
                <p>К сожалению, запрашиваемая страница не существует.</p>
                <div class="buttons">
                    <a class="btn btn-primary btn-outline-hover-dark" href="javascript:history.back()">
                        <i class="fa fa-arrow-left"></i>&nbsp;Назад
                    </a>
                    <a class="btn btn-dark btn-outline-hover-dark" href="{{ route('home') }}">
                        <i class="fa fa-home"></i>&nbsp;На главную
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
