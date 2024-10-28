<div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
    <div class="swiper-wrapper">
        @forelse ($product->images as $img)
        <x-swiper.swiper-slide-min>
            <x-slot name="img" src="{{ asset('storage/images/' . $img->title) }}" alt="{{ $img->title }}"></x-slot>
        </x-swiper.swiper-slide-min>
        @empty
        @endforelse
    </div>

    <div class="swiper-buttons">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
