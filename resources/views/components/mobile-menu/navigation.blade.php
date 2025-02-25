<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <button class="offcanvas-close"></button>
    <div class="user-panel">
        <ul>
            <li><a href="">Заказать звонок</a></li>
            <li><a href="tel:79999999999"><i class="fa fa-phone"></i> +7 999 999-99-99</a></li>
            <li>
                <a href="mailto:zakaz@agatceramic.ru">
                    <i class="fa fa-envelope-o"></i>
                    zakaz@agatceramic.ru
                </a>
            </li>
        </ul>
    </div>
    <div class="inner customScroll">
        <div class="offcanvas-menu mb-4">
            <ul>
                <li>
                    <a href="{{ $categories->contains('title', 'Керамогранит') ? route('category.list', $categories->firstWhere('title', 'Керамогранит')->slug) : 404 }}">
                        Керамогранит
                    </a>
                </li>

                <li>
                    <a href="{{ $categories->contains('title', 'Плитка') ? route('category.list', $categories->firstWhere('title', 'Плитка')->slug) : 404 }}">
                        Плитка
                    </a>
                </li>

                <li>
                    <a href="{{ $categories->contains('title', 'Мозаика') ? route('category.list', $categories->firstWhere('title', 'Мозаика')->slug) : 404 }}">
                        Мозаика
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
                            <a href="{{ $categories->contains('title', 'Клинкер') ? route('category.list', $categories->firstWhere('title', 'Клинкер')->slug) : 404 }}">
                                <span class="menu-text">Клинкер</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ $categories->contains('title', 'Ступени') ? route('category.list', $categories->firstWhere('title', 'Ступени')->slug) : 404 }}">
                                <span class="menu-text">Ступени</span>
                            </a>
                        </li>
                        <li><a href="{{ route('zatirka.list') }}"><span class="menu-text">Затирка для плитки</span></a>
                        <li><a href="{{ route('kleevye-smesi.list') }}"><span class="menu-text">Клеевые смеси</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Сантехника</span></a>
                            <ul class="sub-menu">
                                <li><a href="shop-3-column.html">Ванны</a></li>
                                <li><a href="shop-3-column.html">Унитазы</a></li>
                                <li><a href="shop-3-column.html">Раковины</a></li>
                                <li><a href="shop-3-column.html">Кухонные мойки</a></li>
                                <li><a href="shop-3-column.html">Смесители</a></li>
                                <li><a href="shop-3-column.html">Инсталляции</a></li>
                                <li><a href="shop-3-column.html">Душевые кабины</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="{{ route('partnerships') }}">Дизайнерам</a></li>
                <li><a href="{{ route('delivery') }}">Оплата и доставка</a></li>
                <li><a href="{{ route('return') }}">Возврат и замена</a></li>
                <li><a href="{{ route('contact') }}">Контакты</a></li>
            </ul>
        </div>

        <div class="offcanvas-social">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-telegram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</div>
