<div class="header-bottom  d-none d-lg-block">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-3 col">
                <div class="header-logo">
                    <a href="{{ route('home') }}">
                        <div class="row align-items-center">
                            <img src="{{ asset('assets/images/stock/logo.svg') }}" class="col-3 p-0" alt="logo">
                            <h3 class="col-9 m-0">Agat <span style="color: #8a8a8a">Ceramic</span></h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="search-element">

                    @include('components.search.search')

                </div>
            </div>
            <div class="col-lg-3 col">
                <div class="header-actions">
                    <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                        <div>
                            <span>Корзина</span>
                            <i class="pe-7s-cart"></i>
                            @if (count($cart) > 0)
                                <span class="header-action-num">{{ str_pad(count($cart), STR_PAD_LEFT) }}</span>
                            @endif
                        </div>
                        <span class="header-action-order">Оформить заказ</span>
                    </a>
                    <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                        <i class="pe-7s-menu"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
