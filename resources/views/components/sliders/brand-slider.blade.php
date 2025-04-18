<section class="brand-area pt-100px pb-100px">
    <div class="container">
        <h2 class="text-center d-none my-5">Бренды</h2>
        <div class="brand-slider swiper-container">
            <div class="swiper-wrapper align-items-center">
                @forelse ($brands as $brand)
                    <div class="swiper-slide brand-slider-item text-center px-2">
                        <a href="{{ asset('brand/' . $brand->slug) }}"><img class=" img-fluid" src="{{ asset('storage/brands/' . $brand->img) }}" alt="{{ $brand->title }}" /></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
