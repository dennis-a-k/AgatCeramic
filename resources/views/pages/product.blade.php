@extends('layouts.main')

@section('title')
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
                        <h2>Modern Smart Phone</h2>
                        <div class="pricing-meta">
                            <ul class="d-flex">
                                <li class="new-price">$20.90</li>
                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="read-review"><a class="reviews" href="#">(5 Customer Review)</a></span>
                        </div>
                        <p class="mt-30px">Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmll tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad mill veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip exet commodo consequat. Duis aute irure dolor</p>
                        <div class="pro-details-color-size d-flex">
                            <!-- Right Side Start -->
                            <div class="select-shoing-wrap d-flex align-items-center">
                                <div class="shot-product">
                                    <p>Color:</p>
                                </div>
                                <div class="shop-select">
                                    <select class="shop-sort">
                                        <option data-display="Balck">Balck</option>
                                        <option value="1"> Gold</option>
                                        <option value="2"> Golden</option>
                                        <option value="3"> White</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Right Side End -->
                            <!-- Right Side Start -->
                            <div class="select-shoing-wrap d-flex align-items-center ml-30px">
                                <div class="shot-product">
                                    <p>Size:</p>
                                </div>
                                <div class="shop-select show">
                                    <select class="shop-sort">
                                        <option data-display="XL">XL</option>
                                        <option value="1"> M</option>
                                        <option value="2"> L</option>
                                        <option value="3"> S</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                            <span>SKU:</span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">Ch-256xl</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                            <span>Categories: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">Smart Device, </a>
                                </li>
                                <li>
                                    <a href="#">ETC</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                            <span>Tags: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#">Smart Device, </a>
                                </li>
                                <li>
                                    <a href="#">Phone</a>
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart"> Add To
                                    Cart</button>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area start -->
                    <div class="description-review-wrapper">
                        <div class="description-review-topbar nav">
                            <button data-bs-toggle="tab" data-bs-target="#des-details2">Information</button>
                            <button class="active" data-bs-toggle="tab" data-bs-target="#des-details1">Description</button>
                            <button data-bs-toggle="tab" data-bs-target="#des-details3">Reviews (02)</button>
                        </div>
                        <div class="tab-content description-review-bottom">
                            <div id="des-details2" class="tab-pane">
                                <div class="product-anotherinfo-wrapper text-start">
                                    <ul>
                                        <li><span>Weight</span> 400 g</li>
                                        <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                        <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                        <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="des-details1" class="tab-pane active">
                                <div class="product-description-wrapper">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius tempor incidid
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip efgx ea co consequat. Duis aute irure dolor in
                                        reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occae cupidatat non proident, sunt in culpa qui
                                    </p>
                                </div>
                            </div>
                            <div id="des-details3" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="review-wrapper">
                                            <div class="single-review">
                                                <div class="review-img">
                                                    <img src="assets/images/review-image/1.png" alt="" />
                                                </div>
                                                <div class="review-content">
                                                    <div class="review-top-wrap">
                                                        <div class="review-left">
                                                            <div class="review-name">
                                                                <h4>White Lewis</h4>
                                                            </div>
                                                            <div class="rating-product">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-left">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <div class="review-bottom">
                                                        <p>
                                                            Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                            cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                            euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-review child-review">
                                                <div class="review-img">
                                                    <img src="assets/images/review-image/2.png" alt="" />
                                                </div>
                                                <div class="review-content">
                                                    <div class="review-top-wrap">
                                                        <div class="review-left">
                                                            <div class="review-name">
                                                                <h4>White Lewis</h4>
                                                            </div>
                                                            <div class="rating-product">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="review-left">
                                                            <a href="#">Reply</a>
                                                        </div>
                                                    </div>
                                                    <div class="review-bottom">
                                                        <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                            cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                            euismod vehicula.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="ratting-form-wrapper pl-50">
                                            <h3>Add a Review</h3>
                                            <div class="ratting-form">
                                                <form action="#">
                                                    <div class="star-box">
                                                        <span>Your rating:</span>
                                                        <div class="rating-product">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="rating-form-style">
                                                                <input placeholder="Name" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="rating-form-style">
                                                                <input placeholder="Email" type="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="rating-form-style form-submit">
                                                                <textarea name="Your Review" placeholder="Message"></textarea>
                                                                <button class="btn btn-primary btn-hover-color-primary "
                                                                    type="submit" value="Submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </div>
@endsection