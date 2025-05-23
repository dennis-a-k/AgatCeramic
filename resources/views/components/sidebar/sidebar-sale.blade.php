<div class="col-lg-3 order-lg-first col-md-12 order-md-last">
    <div class="shop-sidebar-wrap">
        @if (isset($categories) && $categories->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Категория</h4>
                <div class="sidebar-widget-category">
                    <ul>
                        @foreach ($categories as $category)
                            <li class="dropdown position-static">
                                <a
                                    href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'category' => $category->slug,
                                        ]),
                                    ) }}">
                                    {{ mb_strtoupper(mb_substr($category->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($category->title, 1, null, 'UTF-8') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (isset($subcategories) && $subcategories->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Подкатегории</h4>
                <div class="sidebar-widget-category">
                    <ul>
                        @foreach ($subcategories as $subcategory)
                            <li class="dropdown position-static">
                                <a
                                    href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'subcategory' => $subcategory->slug,
                                        ]),
                                    ) }}">
                                    {{ mb_strtoupper(mb_substr($subcategory->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($subcategory->title, 1, null, 'UTF-8') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if ($current_category)
            @if (isset($patterns) && $patterns->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Рисунок</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($patterns as $pattern)
                                <li class="dropdown position-static">
                                    <a
                                        href="{{ route(
                                            'sale.filter',
                                            array_merge(request()->query(), [
                                                'pattern' => $pattern->slug,
                                            ]),
                                        ) }}">
                                        {{ mb_strtoupper(mb_substr($pattern->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($pattern->title, 1, null, 'UTF-8') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($weights) && $weights->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Вес (кг)</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($weights as $weight)
                                <li class="color-list weight">
                                    <a href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'weight' => $weight,
                                        ]),
                                    ) }}"
                                        class="text-white">
                                        {{ $weight }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($colors) && $colors->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Цвет</h4>
                    <div class="sidebar-widget-color">
                        <ul class="d-flex flex-wrap">
                            @foreach ($colors as $color)
                                <li class="color-list">
                                    <a href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'color' => $color->slug,
                                        ]),
                                    ) }}"
                                        style="background-color: #{{ $color->code }};" class="colors-filter" data-color="{{ mb_convert_case($color->title, MB_CASE_TITLE, 'UTF-8') }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($glues) && $glues->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Использовать в качестве клея</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($glues as $glue)
                                <li class="color-list weight">
                                    <a href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'glue' => $glue,
                                        ]),
                                    ) }}"
                                        class="text-white">
                                        {{ $glue }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($mixture_types) && $mixture_types->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Тип смеси</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($mixture_types as $type)
                                <li>
                                    <a
                                        href="{{ route(
                                            'sale.filter',
                                            array_merge(request()->query(), [
                                                'mixture_type' => $type,
                                            ]),
                                        ) }}">
                                        {{ $type }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($seams) && $seams->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Ширина шва (мм)</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($seams as $seam)
                                <li class="color-list weight">
                                    <a href="{{ route(
                                        'sale.filter',
                                        array_merge(request()->query(), [
                                            'seam' => $seam,
                                        ]),
                                    ) }}"
                                        class="text-white">
                                        {{ $seam }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($textures) && $textures->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Поверхность</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($textures as $texture)
                                <li>
                                    <a
                                        href="{{ route(
                                            'sale.filter',
                                            array_merge(request()->query(), [
                                                'texture' => $texture->slug,
                                            ]),
                                        ) }}">
                                        {{ mb_strtoupper(mb_substr($texture->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($texture->title, 1, null, 'UTF-8') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($sizes) && $sizes->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Размер</h4>
                    <div class="sidebar-widget-size">
                        <ul>
                            @foreach ($sizes as $size)
                                <li>
                                    <a
                                        href="{{ route(
                                            'sale.filter',
                                            array_merge(request()->query(), [
                                                'size' => $size->title,
                                            ]),
                                        ) }}">
                                        {{ $size->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (isset($brands) && $brands->count())
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Производитель</h4>
                    <div class="sidebar-widget-category">
                        <ul>
                            @foreach ($brands->take(5) as $brand)
                                <li>
                                    <a
                                        href="{{ route(
                                            'sale.filter',
                                            array_merge(request()->query(), [
                                                'brand' => $brand->slug,
                                            ]),
                                        ) }}">
                                        {{ mb_strtoupper(mb_substr($brand->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($brand->title, 1, null, 'UTF-8') }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($brands->count() > 5)
                                <div id="hidden-brands" style="display: none;">
                                    @foreach ($brands->slice(5) as $brand)
                                        <li>
                                            <a
                                                href="{{ route(
                                                    'sale.filter',
                                                    array_merge(request()->query(), [
                                                        'brand' => $brand->slug,
                                                    ]),
                                                ) }}">
                                                {{ mb_strtoupper(mb_substr($brand->title, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($brand->title, 1, null, 'UTF-8') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                                <li>
                                    <a href="#" id="show-all-brands" class="show-more-link">Показать все</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endif
        @endif

        <div class="sidebar-widget">
            <div class="">
                <a href="{{ route('sale') }}" class="btn-filter">
                    Сбросить фильтры
                </a>
            </div>
        </div>
    </div>
</div>
