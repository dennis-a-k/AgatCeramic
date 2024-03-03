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

    <!-- Brand area start -->
    <div class="brand-area pt-100px pb-100px">
        <div class="container">
            <div class="brand-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/1.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/2.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/3.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/4.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->
@endsection
