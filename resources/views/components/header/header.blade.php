<header>
    @include('components.header.header-top')

    @include('components.header.header-bottom')

    @include('components.header.header-mobile')

    @include('components.header.navbar')

    @include('components.header.nav-alphabet')

    <div class="mobile-search-box d-lg-none">
        <div class="container">
            <div class="search-element max-width-100">
                <form action="#">
                    <input type="text" placeholder="Поиск" />
                    <button><i class="pe-7s-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</header>
