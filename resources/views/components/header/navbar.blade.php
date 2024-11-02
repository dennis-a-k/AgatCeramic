<div class="header-nav-area d-none d-lg-block sticky-nav">
    <div class="container">
        <div class="header-nav">
            <div class="main-menu position-relative">
                <ul>
                    <li class="dropdown"><a href="#">Каталог <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', 'Клинкер') ? route('category.list', $categories->firstWhere('title', 'Клинкер')->slug) : 404 }}">
                                    Клинкер
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', 'Ступени') ? route('category.list', $categories->firstWhere('title', 'Ступени')->slug) : 404 }}">
                                    Ступени
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', 'Затирка для плитки') ? route('category.list', $categories->firstWhere('title', 'Затирка для плитки')->slug) : 404 }}">
                                    Затирка для плитки
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', 'Клеевые смеси') ? route('category.list', $categories->firstWhere('title', 'Клеевые смеси')->slug) : 404 }}">
                                    Клеевые смеси
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="#">
                                    Сантехника
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <ul class="sub-menu sub-menu-2">
                                    <li><a href="blog-grid.html">Ванны</a></li>
                                    <li><a href="blog-grid.html">Унитазы</a></li>
                                    <li><a href="blog-grid.html">Раковины</a></li>
                                    <li><a href="blog-grid.html">Кухонные мойки</a></li>
                                    <li><a href="blog-grid.html">Смесители</a></li>
                                    <li><a href="blog-grid.html">Инсталляции</a></li>
                                    <li><a href="blog-grid.html">Душевые кабины</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#">Услуги <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li class="dropdown position-static"><a href="{{ route('rezka') }}">Резка</a></li>
                            <li class="dropdown position-static">
                                <a href="{{ route('rospis') }}">Роспись плитки</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a
                            href="{{ $categories->contains('title', 'Керамогранит') ? route('category.list', $categories->firstWhere('title', 'Керамогранит')->slug) : 404 }}">
                            Керамогранит
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ $categories->contains('title', 'Плитка') ? route('category.list', $categories->firstWhere('title', 'Плитка')->slug) : 404 }}">
                            Плитка
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ $categories->contains('title', 'Мозаика') ? route('category.list', $categories->firstWhere('title', 'Мозаика')->slug) : 404 }}">
                            Мозаика
                        </a>
                    </li>

                    <li><a href="{{ route('partnerships') }}">Дизайнерам</a></li>

                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
