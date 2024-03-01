<header>
    <!-- Header top area -->
    @include('components.header.header-top')

    <!-- Header bottom area -->
    @include('components.header.header-bottom')

    <!-- Header mobile area -->
    @include('components.header.header-mobile')

    <!-- Header navigation area -->
    @include('components.header.navbar')

    <!-- Header nav-alphabet area -->
    @include('components.header.nav-alphabet')

    <div class="mobile-search-box d-lg-none">
        <div class="container">
            <!-- mobile search start -->
            <div class="search-element max-width-100">
                <form action="#">
                    <input type="text" placeholder="Поиск" />
                    <button><i class="pe-7s-search"></i></button>
                </form>
            </div>
            <!-- mobile search start -->
        </div>
    </div>
</header>
