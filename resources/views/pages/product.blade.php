@extends('layouts.main')

@section('title')
    {{ $product->category->title }} {{ $product->title }} купить в
@endsection

@section('seo')
    <meta name="description" content="{{ $description }}">
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:type" content="product">
    <meta property="og:url" content="{{ $product->images->first() }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="product:price:amount" content="{{ $product->price }}">
    <meta property="product:price:currency" content="RUB">
@endsection

@section('content')
    <main class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">

                    @include('components.swiper.swiper')

                    @include('components.swiper.swiper-slider')
                </div>
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content ml-25px">
                        @if ($product->sale == '1')
                            <span class="badges">
                                <span class="sale">Sale</span>
                            </span>
                        @endif

                        <h1>{{ $product->category->title }} {{ $product->title }}</h1>

                        <div class="pricing-meta">
                            <ul class="d-flex">
                                <li class="new-price">{{ number_format($product->price, 2, '.', ' ') }} &#8381;</li>
                            </ul>
                        </div>

                        @include('components.product.information-product')

                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <p>
                                @if ($product->unit === 'шт')
                                    шт.
                                @else
                                    м<sup>2</sup>
                                @endif
                            </p>
                            <div class="pro-details-cart">
                                <button class="add-cart" data-product-id="{{ $product->id }}">В корзину</button>
                            </div>
                        </div>
                    </div>

                    @include('components.product.details-product')
                </div>
            </div>
        </div>
    </main>
@endsection

@section('css')
    <style>
        .badges {
            display: block;
            width: fit-content;
            margin-bottom: 15px;
        }

        .sale {
            font-size: 18px;
            line-height: 1.75;
            display: block;
            padding: 0 12px;
            text-align: center;
            text-transform: uppercase;
            border-radius: 5px;
            color: #fff;
            font-weight: 600;
            background-color: #c50101;
        }
    </style>
@endsection
