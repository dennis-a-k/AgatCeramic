<section class="product-area pb-100px">
    <div class="container">
        <h2 class="text-center d-none my-5">Товары</h2>
        @include('components.goods.main-nav-goods')
        <div class="row">
            <div class="col">
                <div class="tab-content mt-60px">
                    @include('components.goods.one-tab')

                    @include('components.goods.two-tab')

                    @include('components.goods.three-tab')
                </div>
            </div>
        </div>
    </div>
</section>
