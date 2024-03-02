@extends('layouts.main')

@section('content')
    @include('components.sliders.main-slider')

    @include('components.banner.banner')

    <!-- Product Area Start -->
    <div class="product-area pb-100px">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <div class="col-12">
                    <!-- Tab Start -->
                    <div class="tab-slider d-md-flex justify-content-md-between align-items-md-center">
                        <ul class="product-tab-nav nav justify-content-start align-items-center">
                            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#newarrivals">New
                                    Arrivals</button>
                            </li>
                            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#toprated">Top Rated</button>
                            </li>
                            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#featured">Featured</button>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
            </div>
            <!-- Section Title & Tab End -->
            <div class="row">
                <div class="col">
                    <div class="tab-content mt-60px">
                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="newarrivals">
                            <div class="row mb-n-30px">
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/1.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Modern Smart Phone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview" title="Quick view"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/2.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/2.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Bluetooth Headphone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$48.50</span>
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview" title="Quick view"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/3.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/3.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Music Box
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/4.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Air Pods 25Hjkl Black
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/5.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/5.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Hand Watch
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-8%</span>
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/6.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/6.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Table Camera
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$138.50</span>
                                                <span class="new">$112.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/7.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Round Pocket Router
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/8.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/8.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Power Bank 10000Mhp
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$260.00</span>
                                                <span class="new">$238.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 1st tab end -->
                        <!-- 2nd tab start -->
                        <div class="tab-pane fade" id="toprated">
                            <div class="row">
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/1.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Modern Smart Phone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/2.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/2.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Bluetooth Headphone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$48.50</span>
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/3.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/3.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Music Box
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/4.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Air Pods 25Hjkl Black
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/5.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/5.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Hand Watch
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-8%</span>
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/6.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/6.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Table Camera
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$138.50</span>
                                                <span class="new">$112.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/7.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Round Pocket Router
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/8.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/8.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Power Bank 10000Mhp
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$260.00</span>
                                                <span class="new">$238.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2nd tab end -->
                        <!-- 3rd tab start -->
                        <div class="tab-pane fade" id="featured">
                            <div class="row">
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/1.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Modern Smart Phone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-10%</span>
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/2.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/2.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Bluetooth Headphone
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$48.50</span>
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/3.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/3.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Music Box
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/4.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Air Pods 25Hjkl
                                                    Black
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/5.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/5.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Hand Watch
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-8%</span>
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/6.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/6.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Smart Table Camera
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$138.50</span>
                                                <span class="new">$112.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="new">Sale</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/7.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/1.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Round Pocket Router
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new">$38.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Cart"><i class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                            <span class="sale">-5%</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img src="assets/images/product-image/8.webp" alt="Product" />
                                                <img class="hover-image" src="assets/images/product-image/8.webp"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">Accessories</a></span>
                                            <h5 class="title"><a href="single-product.html">Power Bank 10000Mhp
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="old">$260.00</span>
                                                <span class="new">$238.50</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                    class="pe-7s-shopbag"></i></button>
                                            <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Wishlist"><i
                                                    class="pe-7s-like"></i></button>
                                            <button class="action quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                            <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-Compare"><i
                                                    class="pe-7s-refresh-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 3rd tab end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->
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
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/1.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/2.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/3.png"
                                alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/partner/4.png"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->
@endsection
