@extends('layouts.main')

@section('title', 'Интернет-магазин плитки, керамогранита и сантехники в Москве ')

@section('content')
    @include('components.sliders.main-slider')

    @include('components.banner.banner')

    @include('components.goods.main-goods')

    @include('components.banner.fashion-banner')

    @include('components.sliders.brand-slider')
@endsection
