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
                                            'category_id' => $category->id,
                                            'brand_slug' => isset($brand) ? $brand->slug : null,
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
                                            'pattern_id' => $pattern->id,
                                            'brand_slug' => isset($brand) ? $brand->slug : null,
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

        @if (isset($colors) && $colors->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Цвет</h4>
                <div class="sidebar-widget-color">
                    <ul class="d-flex flex-wrap">
                        @foreach ($colors as $color)
                            <li>
                                <a href="{{ route(
                                    'filters',
                                    array_merge(request()->query(), [
                                        'color_id' => $color->id,
                                        'brand_slug' => isset($brand) ? $brand->slug : null,
                                    ]),
                                ) }}"
                                    style="background-color: #{{ $color->code }};" class="colors-filter"
                                    data-color="{{ mb_convert_case($color->title, MB_CASE_TITLE, 'UTF-8') }}"">
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
                                            'texture_id' => $texture->id,
                                            'brand_slug' => isset($brand) ? $brand->slug : null,
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
                                            'size_id' => $size->id,
                                            'brand_slug' => isset($brand) ? $brand->slug : null,
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
                <a href="{{ route('filters', ['brand_slug' => isset($brand) ? $brand->slug : null]) }}"
                    class="btn-filter">
                    Сбросить фильтры
                </a>
            </div>
        </div>
    </div>
</div>
