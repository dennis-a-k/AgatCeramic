@extends('layouts.main')

@section('title')
    {{ $product->category->subtitle }} {{ $product->title }}{{ $product->weight_kg ? ', ' . $product->weight_kg . ' кг' : '' }} купить в
@endsection

@section('seo')
    <meta name="description" content="{{ $description }}">
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:type" content="product">
    <meta property="og:image" content="{{ $product->images->first() ? asset('storage/images/' . $product->images->first()->title) : asset('assets/images/stock/stock-image.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="product:price:amount" content="{{ $product->price }}">
    <meta property="product:price:currency" content="RUB">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url"
        content="{{ route('product.show', [
            'category' => $product->category->slug,
            'slug' => $product->slug,
            'sku' => $product->sku,
        ]) }}">
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

                        <h1 class="h3">{{ $product->category->subtitle }} {{ $product->title }}{{ $product->weight_kg ? ', ' . $product->weight_kg . ' кг' : '' }}</h1>

                        <div class="pricing-meta">
                            <ul class="d-flex">
                                <li class="new-price">
                                    <span class="h1">
                                        {{ number_format($product->price, 2, '.', ' ') }} &#8381;
                                    </span>
                                </li>
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

        .product-details-content .pricing-meta ul li span {
            color: #6e7f89;
        }
    </style>
@endsection
