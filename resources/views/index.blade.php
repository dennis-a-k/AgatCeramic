@extends('layouts.main')

@section('content')
    @include('components.sliders.main-slider')

    @include('components.banner.banner')

    @include('components.goods.main-goods')
    <!-- Fashion Area Start -->
    <div class="fashion-area" data-bg-image="assets/images/fashion/fashion-bg.webp">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 text-center">
                    <h2 class="title"> <span>Smart Fashion</span> With Smart Devices </h2>
                    <a href="shop-left-sidebar.html" class="btn btn-primary text-capitalize m-auto">Shop All
                        Devices</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fashion Area End -->

    @include('components.sliders.brand-slider')
@endsection
