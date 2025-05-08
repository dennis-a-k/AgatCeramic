<section class="banner-area style-two pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/keramogranit.jpeg" alt="keramogranit"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамогранит
                </x-slot>

                <x-slot name="category">
                    От ведущих<br>
                    производителей
                </x-slot>

                <x-slot name="url"
                    href="{{ $categories->contains('title', config('categories.keramogranit')) ? route('category.list', $categories->firstWhere('title', config('categories.keramogranit'))->slug) : 404 }}">
                </x-slot>
            </x-banner.single-banner>

            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/plitka.jpg" alt="plitka"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамическая плитка
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url"
                    href="{{ $categories->contains('title', config('categories.plitka')) ? route('category.list', $categories->firstWhere('title', config('categories.plitka'))->slug) : 404 }}">
                </x-slot>
            </x-banner.single-banner>
        </div>

        <div class="row">
            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/mozaika.jpeg" alt="mozaika"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Керамическая мозаика
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url"
                    href="{{ $categories->contains('title', config('categories.mozaika')) ? route('category.list', $categories->firstWhere('title', config('categories.mozaika'))->slug) : 404 }}">
                </x-slot>
            </x-banner.single-banner>

            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/zatirka.jpg" alt="zatirka"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Затирка для керамической плитки
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url"
                    href="{{ $categories->contains('title', config('categories.zatirka')) ? route('category.list', $categories->firstWhere('title', config('categories.zatirka'))->slug) : 404 }}"></x-slot>
            </x-banner.single-banner>
            {{--
            <x-banner.single-banner class="nth-child-2 mb-30px mb-lm-30px mt-lm-30px">
                <x-slot name="img" src="assets/images/banner/santekhnika.jpeg" alt="santekhnika"></x-slot>

                <x-slot name="title" class="nth-child-2">
                    Сантехника
                </x-slot>

                <x-slot name="category"></x-slot>

                <x-slot name="url"
                    href="{{ $categories->contains('title', config('categories.santexnika')) ? route('category.list', $categories->firstWhere('title', config('categories.santexnika'))->slug) : 404 }}"></x-slot>
            </x-banner.single-banner> --}}
        </div>
    </div>
</section>
