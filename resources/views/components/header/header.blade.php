<header>
    @include('components.header.header-top')

    @include('components.header.header-bottom', ['cart' => $cart])

    @include('components.header.header-mobile', ['cart' => $cart])

    @include('components.header.navbar')

    @include('components.header.nav-alphabet')

    <div class="mobile-search-box d-lg-none">
        <div class="container">
            <div class="search-element max-width-100">

                @include('components.search.search')

            </div>
        </div>
    </div>
</header>
