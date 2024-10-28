<div class="col-lg-3 order-lg-first col-md-12 order-md-last">
    <div class="shop-sidebar-wrap">
        <div class="sidebar-widget">
            <h4 class="sidebar-title">Рисунок</h4>
            <div class="sidebar-widget-category">
                <ul>
                    @foreach ($patterns as $pattern)
                    <li class="dropdown position-static">
                        <a href="blog-list-left-sidebar.html">
                            {{ $pattern->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar-widget">
            <h4 class="sidebar-title">Цвет</h4>
            <div class="sidebar-widget-color">
                <ul class="d-flex flex-wrap">
                    @foreach ($colors as $color)
                    <li><a href="#" style="background-color: #{{ $color->code }};"></a></li>
                    @endforeach
                    {{-- <li><a href="#" class="color-1"></a></li>
                    <li><a href="#" class="color-2"></a></li>
                    <li><a href="#" class="color-3"></a></li>
                    <li><a href="#" class="color-4"></a></li>
                    <li><a href="#" class="color-5"></a></li>
                    <li><a href="#" class="color-6"></a></li>
                    <li><a href="#" class="color-7"></a></li>
                    <li><a href="#" class="color-8"></a></li>
                    <li><a href="#" class="color-9"></a></li>
                    <li><a href="#" class="color-10"></a></li>
                    <li><a href="#" class="color-11"></a></li>
                    <li><a href="#" class="color-12"></a></li>
                    <li><a href="#" class="color-13"></a></li>
                    <li><a href="#" class="color-14"></a></li> --}}
                </ul>
            </div>
        </div>

        <div class="sidebar-widget">
            <h4 class="sidebar-title">Поверхность</h4>
            <div class="sidebar-widget-size">
                <ul>
                    @foreach ($textures as $texture)
                    <li><a href="#">{{ $texture->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar-widget">
            <h4 class="sidebar-title">Размер</h4>
            <div class="sidebar-widget-size">
                <ul>
                    @foreach ($sizes as $size)
                    <li><a href="#">{{ $size->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar-widget">
            <h4 class="sidebar-title">Производитель</h4>
            <div class="sidebar-widget-brand">
                <ul>
                    @foreach ($brands as $brand)
                    <li><a href="#">{{ $brand->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
