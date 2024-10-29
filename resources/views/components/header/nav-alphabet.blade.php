<div class="header-nav-alphabet d-none d-lg-block">
    <div class="container">
        <div class="second-menu position-relative">
            <ul>
                <li><span>Бренды:</span></li>
                @foreach ($groupedBrands as $letter => $brands)
                <li class="dropdown position-static"><a href="#">{{ $letter }}</a>
                    <ul class="mega-menu">
                        @foreach ($brands as $brand)
                        <li><a href="{{ route('brand.list', $brand->slug) }}">{{ ucfirst($brand->title) }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
