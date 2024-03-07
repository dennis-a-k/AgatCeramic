@extends('layouts.main')

@section('title')
    | Керамогранит розовый
@endsection

@section('content')
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">

                    @include('components.swiper.swiper')

                    @include('components.swiper.swiper-slider')
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content ml-25px">
                        <h2>Керамогранит розовый розовый розовый розовый розовый розовый розовыйрозовыйрозовый розовый
                            розовый
                        </h2>

                        <div class="pricing-meta">
                            <ul class="d-flex">
                                <li class="new-price">20.90 &#8381;</li>
                            </ul>
                        </div>

                        @include('components.product.information-product')

                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <p> м<sup>2</sup></p>
                            <div class="pro-details-cart">
                                <button class="add-cart">В корзину</button>
                            </div>
                        </div>
                    </div>

                    @include('components.product.details-product')
                </div>
            </div>
        </div>
    </div>
@endsection
