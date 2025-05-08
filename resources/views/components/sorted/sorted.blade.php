<div class="shop-top-bar d-flex justify-content-end">
    <div class="select-shoing-wrap d-flex align-items-center">
        <div class="shot-product">
            <p>Сортировать:</p>
        </div>
        <div class="header-bottom-set dropdown">
            <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                {{ request('sort', 'default') === 'default'
                    ? 'по умолчанию'
                    : (request('sort') === 'alphabet'
                        ? 'по алфавиту'
                        : (request('sort') === 'price_asc'
                            ? 'по низкой цене'
                            : (request('sort') === 'price_desc'
                                ? 'по высокой цене'
                                : 'по умолчанию'))) }}
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'alphabet']) }}">по алфавиту</a></li>
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">по низкой цене</a></li>
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">по высокой цене</a></li>
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'default']) }}">по умолчанию</a></li>
            </ul>
        </div>
    </div>
</div>
