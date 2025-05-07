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
                                        'filters',
                                        array_merge(request()->query(), [
                                            'category' => $category->slug,
                                            'brand' => isset($brand) ? $brand->slug : null,
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

        @if (isset($patterns) && $patterns->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Рисунок</h4>
                <div class="sidebar-widget-category">
                    <ul>
                        @foreach ($patterns as $pattern)
                            <li class="dropdown position-static">
                                <a
                                    href="{{ route(
                                        'filters',
                                        array_merge(request()->query(), [
                                            'pattern' => $pattern->slug,
                                            'brand' => isset($brand) ? $brand->slug : null,
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
                                    'filters',
                                    array_merge(request()->query(), [
                                        'weight' => $weight,
                                        'brand' => isset($brand) ? $brand->slug : null,
                                    ]),
                                ) }}" class="text-white">
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
                                    'filters',
                                    array_merge(request()->query(), [
                                        'color' => $color->slug,
                                        'brand' => isset($brand) ? $brand->slug : null,
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
                                    'filters',
                                    array_merge(request()->query(), [
                                        'glue' => $glue,
                                        'brand' => isset($brand) ? $brand->slug : null,
                                    ]),
                                ) }}"  class="text-white">
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
                                <a href="{{ route(
                                    'filters',
                                    array_merge(request()->query(), [
                                        'mixture_type' => $type,
                                        'brand' => isset($brand) ? $brand->slug : null,
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
                                    'filters',
                                    array_merge(request()->query(), [
                                        'seam' => $seam,
                                        'brand' => isset($brand) ? $brand->slug : null,
                                    ]),
                                ) }}"  class="text-white">
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
                                        'filters',
                                        array_merge(request()->query(), [
                                            'texture' => $texture->slug,
                                            'brand' => isset($brand) ? $brand->slug : null,
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
                                        'filters',
                                        array_merge(request()->query(), [
                                            'size' => $size->title,
                                            'brand' => isset($brand) ? $brand->slug : null,
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

        <div class="sidebar-widget">
            <div class="">
                <a href="{{ route('filters', ['brand' => isset($brand) ? $brand->slug : null]) }}" class="btn-filter">
                    Сбросить фильтры
                </a>
            </div>
        </div>
    </div>
</div>
