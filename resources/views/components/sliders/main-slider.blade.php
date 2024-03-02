<div class="section ">
    <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
        <div class="swiper-wrapper">
            <x-sliders.hero-slide data-bg-image="assets/images/hero/bg/hero-bg-1.jpeg">
                <x-slot name="title">
                    Добро пожаловать в АгатКерамик
                </x-slot>

                <x-slot name="text">
                    Магазин <br>
                    Керамогранита и <br>
                    кафельной плитки
                </x-slot>

                <x-slot name="btn" href="https://google.ru">
                    Перейти к покупкам
                </x-slot>

                <x-slot name="img">
                    <img src="assets/images/hero/inner-img/hero-1-1.jpg" alt="hero-1" />
                </x-slot>
            </x-sliders.hero-slide>

            <x-sliders.hero-slide data-bg-image="assets/images/hero/bg/hero-bg-2.jpg">
                <x-slot name="title">
                    Welcome To AgatCeramic
                </x-slot>

                <x-slot name="text">
                    Your Home <br>
                    Smart Devices & <br>
                    Best Solution
                </x-slot>

                <x-slot name="btn" href="https://ya.ru">
                    Shop All Devices
                </x-slot>

                <x-slot name="img">
                    <img src="assets/images/hero/inner-img/hero-1-2.jpg" alt="hero-1-2" />
                </x-slot>
            </x-sliders.hero-slide>
        </div>

        <div class="swiper-pagination swiper-pagination-white"></div>

        <div class="swiper-buttons">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
