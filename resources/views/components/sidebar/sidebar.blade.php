<div class="col-lg-3 order-lg-first col-md-12 order-md-last">
    <div class="shop-sidebar-wrap">
        @if ($patterns->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Рисунок</h4>
                <div class="sidebar-widget-category">
                    <ul>
                        @foreach ($patterns as $pattern)
                            <li class="dropdown position-static">
                                <a
                                    href="{{ route(
                                        'filter',
                                        array_merge(request()->query(), [
                                            'pattern_id' => $pattern->id,
                                            'category_slug' => isset($category) ? $category->slug : null,
                                        ]),
                                    ) }}">
                                    {{ $pattern->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if ($colors->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Цвет</h4>
                <div class="sidebar-widget-color">
                    <ul class="d-flex flex-wrap">
                        @foreach ($colors as $color)
                            <li>
                                <a href="{{ route(
                                    'filter',
                                    array_merge(request()->query(), [
                                        'color_id' => $color->id,
                                        'category_slug' => isset($category) ? $category->slug : null,
                                    ]),
                                ) }}"
                                    style="background-color: #{{ $color->code }};" class="colors-filter"
                                    data-color="{{ $color->title }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if ($textures->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Поверхность</h4>
                <div class="sidebar-widget-size">
                    <ul>
                        @foreach ($textures as $texture)
                            <li>
                                <a
                                    href="{{ route(
                                        'filter',
                                        array_merge(request()->query(), [
                                            'texture_id' => $texture->id,
                                            'category_slug' => isset($category) ? $category->slug : null,
                                        ]),
                                    ) }}">
                                    {{ $texture->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if ($sizes->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Размер</h4>
                <div class="sidebar-widget-size">
                    <ul>
                        @foreach ($sizes as $size)
                            <li>
                                <a
                                    href="{{ route(
                                        'filter',
                                        array_merge(request()->query(), [
                                            'size_id' => $size->id,
                                            'category_slug' => isset($category) ? $category->slug : null,
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

        @if ($brands->count())
            <div class="sidebar-widget">
                <h4 class="sidebar-title">Производитель</h4>
                <div class="sidebar-widget-brand">
                    <ul>
                        @foreach ($brands as $brand)
                            <li>
                                <a
                                    href="{{ route(
                                        'filter',
                                        array_merge(request()->query(), [
                                            'brand_id' => $brand->id,
                                            'category_slug' => isset($category) ? $category->slug : null,
                                        ]),
                                    ) }}">
                                    {{ $brand->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="sidebar-widget">
            <div class="">
                <a href="{{ route('filter', ['category_slug' => isset($category) ? $category->slug : null]) }}"
                    class="btn-filter">
                    Сбросить фильтры
                </a>
            </div>
        </div>
    </div>
</div>
