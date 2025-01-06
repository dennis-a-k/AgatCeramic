@extends('layouts.main')

@section('title', ' | Спасибо за заказ!')

@section('content')
    <div class="shop-category-area pt-100px pb-100px">
        <div class="thank-you-area">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="inner_complated">
                            <div class="img_cmpted"><img src="assets/images/icons/cmpted_logo.png" alt=""></div>
                            <p class="dsc_cmpted">Thank you for ordering in our store. You will receive a confirmation
                                email shortly.</p>
                            <div class="btn_cmpted">
                                <a href="shop-4-column.html" class="shop-btn" title="Go To Shop">Continue Shopping </a>
                            </div>
                        </div>
                        <div class="main_quickorder text-align-center">
                            <h3 class="title">Call Us for Quick Order</h3>
                            <div class="cntct typewriter-effect">
                                <span class="call_desk">
                                    <a href="tel:+01234567890" id="typewriter_num">
                                        {{ $order_number }}
                                    </a>
                                </span>
                            </div>
                            @if (session('success'))
                                <p>{{ session('success') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
