@extends('layouts.main')

@section('title')
    {{ $title }} купить в Москве по низкой цене с доставкой
@endsection

@section('seo')
    <meta name="description"
        content="{{ config('app.name') }} — интернет-магазин керамической плитки, керамогранита и мозаики в Москве и Московской области. В интернет-магазине {{ config('app.name') }} вы найдете премиальную керамическую плитку, керамогранит и мозаику от ведущих мировых производителей. Мы предлагаем эксклюзивные коллекции для создания уникального дизайна интерьера: напольную и настенную плитку, износостойкий керамогранит для коммерческих и жилых помещений, а также стильную мозаику для акцентных решений.">
    <meta property="og:title" content="Интернет-магазин плитки, керамогранита и сантехники в Москве {{ config('app.name') }}">
    <meta property="og:description"
        content="{{ config('app.name') }} — интернет-магазин керамической плитки, керамогранита и мозаики в Москве и Московской области. В интернет-магазине {{ config('app.name') }} вы найдете премиальную керамическую плитку, керамогранит и мозаику от ведущих мировых производителей. Мы предлагаем эксклюзивные коллекции для создания уникального дизайна интерьера: напольную и настенную плитку, износостойкий керамогранит для коммерческих и жилых помещений, а также стильную мозаику для акцентных решений.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/stock/logo.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url" content="{{ route('home') }}">
@endsection

@section('content')
    <main class="shop-category-area">
        <div class="container">
            <h1 class="text-center d-none my-5">Купить сантехнику в {{ config('app.name') }}</h1>

            <section class="banner-area style-two pt-100px pb-100px">
                <div class="container">
                    <div class="row">
                        @foreach ($plumbing->children as $child)
                            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                                @if (!$child->img)
                                    <x-slot name="img" src="assets/images/stock/default.jpg" alt="{{ $child->slug }}"></x-slot>
                                @else
                                    <x-slot name="img" src="storage/plumbing/{{ $child->img }}" alt="{{ $child->slug }}"></x-slot>
                                @endif

                                <x-slot name="title" class="nth-child-2">{{ $child->title }}</x-slot>

                                <x-slot name="category"></x-slot>

                                <x-slot name="url" href="{{ route('plumbing.category', $child->slug) }}"></x-slot>
                            </x-banner.single-banner>
                        @endforeach
                    </div>
            </section>

        </div>
    </main>
@endsection
