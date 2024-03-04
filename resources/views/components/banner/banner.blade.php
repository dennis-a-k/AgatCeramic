<div class="banner-area style-two pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/3.jpg" alt="banner"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамогранит
                </x-slot>

                <x-slot name="category">
                    От ведущих<br>
                    производителей
                </x-slot>

                <x-slot name="url" href="{{ route('keramogranit.list') }}"></x-slot>
            </x-banner.single-banner>

            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/4.jpg" alt="banner"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамическая плитка
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url" href="{{ route('plitka.list') }}"></x-slot>
            </x-banner.single-banner>
        </div>

        <div class="row">
            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/5.jpg" alt="banner"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамическая мозаика
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url" href="{{ route('mozaika.list') }}"></x-slot>
            </x-banner.single-banner>

            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/6.jpg" alt="banner"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Сантехника
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url" href="{{ route('santekhnika.list') }}"></x-slot>
            </x-banner.single-banner>
        </div>
    </div>
</div>
