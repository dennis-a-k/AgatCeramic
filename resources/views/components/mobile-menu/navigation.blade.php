<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="user-panel">
        <ul>
            <li>
                <a href="#" class="modal-call" data-link-action="modal-call" data-bs-toggle="modal" data-bs-target="#modalCall">
                    Заказать звонок
                </a>
            </li>
            <li><a href="tel:{{ $appData->app_phone ?? '---' }}" class="phone-link"><i class="fa fa-phone"></i> {{ $appData->appPhoneFormatted ?? '---' }}</a></li>
            <li>
                <a href="mailto:{{ $appData->app_email ?? '---' }}">
                    <i class="fa fa-envelope-o"></i>
                    {{ $appData->app_email ?? '---' }}
                </a>
            </li>
        </ul>
    </div>
    <div class="inner customScroll">
        <nav class="offcanvas-menu mb-4">
            <ul>
                <li>
                    <a
                        href="{{ $categories->contains('title', config('categories.keramogranit')) ? route('category.list', $categories->firstWhere('title', config('categories.keramogranit'))->slug) : 404 }}">
                        {{ config('categories.keramogranit') }}
                    </a>
                </li>

                <li>
                    <a href="{{ $categories->contains('title', config('categories.plitka')) ? route('category.list', $categories->firstWhere('title', config('categories.plitka'))->slug) : 404 }}">
                        {{ config('categories.plitka') }}
                    </a>
                </li>

                <li>
                    <a href="{{ $categories->contains('title', config('categories.mozaika')) ? route('category.list', $categories->firstWhere('title', config('categories.mozaika'))->slug) : 404 }}">
                        {{ config('categories.mozaika') }}
                    </a>
                </li>

                <li>
                    <a href="#"><span class="menu-text">Услуги</span></a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('rezka') }}"><span class="menu-text">Резка</span></a></li>
                        <li><a href="{{ route('rospis') }}"><span class="menu-text">Роспись плитки</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><span class="menu-text">Каталог</span></a>
                    <ul class="sub-menu">
                        <li>
                            <a
                                href="{{ $categories->contains('title', config('categories.klinker')) ? route('category.list', $categories->firstWhere('title', config('categories.klinker'))->slug) : 404 }}">
                                <span class="menu-text">{{ config('categories.klinker') }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ $categories->contains('title', config('categories.stupeni')) ? route('category.list', $categories->firstWhere('title', config('categories.stupeni'))->slug) : 404 }}">
                                <span class="menu-text">{{ config('categories.stupeni') }}</span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ $categories->contains('title', config('categories.zatirka')) ? route('category.list', $categories->firstWhere('title', config('categories.zatirka'))->slug) : 404 }}">
                                <span class="menu-text">{{ config('categories.zatirka') }}</span>
                            </a>
                        <li>
                            <a
                                href="{{ $categories->contains('title', config('categories.kleya')) ? route('category.list', $categories->firstWhere('title', config('categories.kleya'))->slug) : 404 }}">
                                <span class="menu-text">{{ config('categories.kleya') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">{{ config('categories.santexnika') }}</span></a>
                            <ul class="sub-menu">
                                @foreach ($plumbing->children->sortBy('title') as $child)
                                    <li><a href="{{ route('plumbing.category', $child->slug) }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="{{ route('partnerships') }}" target="_blank">Дизайнерам</a></li>
                <li><a href="{{ route('delivery') }}">Оплата и доставка</a></li>
                <li><a href="{{ route('return') }}">Возврат и замена</a></li>
                <li><a href="{{ route('contact') }}">Контакты</a></li>
                <li><a href="{{ route('sale') }}" class="text-danger">Распродажа</a></li>
            </ul>
        </nav>

        <div class="offcanvas-social">
            <ul>
                <li>
                    <a href="https://t.me/{{ $appData->telegram ?? '---' }}" target="_blanc"><i class="fa fa-telegram"></i></a>
                </li>
                <li>
                    <a href="https://wa.me/{{ $appData->whatsapp ?? '---' }}" target="_blanc"><i class="fa fa-whatsapp"></i></a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</div>
