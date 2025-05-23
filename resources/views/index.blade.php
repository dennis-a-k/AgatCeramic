@extends('layouts.main')

@section('title', 'Интернет-магазин плитки, керамогранита и сантехники в Москве и МО ')

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
    @include('components.sliders.main-slider')

    <h1 class="text-center d-none my-5">Интернет-магазин плитки, керамогранита и сантехники</h1>

    @include('components.banner.banner')

    @include('components.goods.main-goods')

    @include('components.banner.sale-banner')

    @include('components.sliders.brand-slider')
@endsection
