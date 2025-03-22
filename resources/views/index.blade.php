@extends('layouts.main')

@section('title', 'Интернет-магазин плитки, керамогранита и сантехники в Москве ')

@section('seo')
    <meta name="description"
        content="Agat Ceramic — интернет-магазин керамической плитки, керамогранита и мозаики в Москве и Московской области. В интернет-магазине Agat Ceramic вы найдете премиальную керамическую плитку, керамогранит и мозаику от ведущих мировых производителей. Мы предлагаем эксклюзивные коллекции для создания уникального дизайна интерьера: напольную и настенную плитку, износостойкий керамогранит для коммерческих и жилых помещений, а также стильную мозаику для акцентных решений.">
    <meta property="og:title" content="Интернет-магазин плитки, керамогранита и сантехники в Москве Agat Ceramic">
    <meta property="og:description"
        content="Agat Ceramic — интернет-магазин керамической плитки, керамогранита и мозаики в Москве и Московской области. В интернет-магазине Agat Ceramic вы найдете премиальную керамическую плитку, керамогранит и мозаику от ведущих мировых производителей. Мы предлагаем эксклюзивные коллекции для создания уникального дизайна интерьера: напольную и настенную плитку, износостойкий керамогранит для коммерческих и жилых помещений, а также стильную мозаику для акцентных решений.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/stock/logo.svg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url" content="{{ route('home') }}">
@endsection

@section('content')
    @include('components.sliders.main-slider')

    @include('components.banner.banner')

    @include('components.goods.main-goods')

    @include('components.banner.fashion-banner')

    @include('components.sliders.brand-slider')
@endsection
