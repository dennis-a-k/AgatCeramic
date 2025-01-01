<div class="swiper zoom-top">
    <div class="swiper-wrapper">
        @forelse ($product->images as $img)
            <x-swiper.swiper-slide>
                <x-slot name="url">{{ asset('storage/images/' . $img->title) }}</x-slot>
                <x-slot name="alt">{{ $img->title }}</x-slot>
            </x-swiper.swiper-slide>
        @empty
            <x-swiper.swiper-slide>
                <x-slot name="url">{{ asset('assets/images/stock/stock-image.png') }}</x-slot>
                <x-slot name="alt">нет фото</x-slot>
            </x-swiper.swiper-slide>
        @endforelse
    </div>
</div>
