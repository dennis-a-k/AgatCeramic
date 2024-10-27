<div class="header-nav-area d-none d-lg-block sticky-nav">
    <div class="container">
        <div class="header-nav">
            <div class="main-menu position-relative">
                <ul>
                    <li class="dropdown "><a href="#">Каталог <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li class="dropdown position-static">
                                <a href="{{ route('klinker.list') }}">Клинкер</a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="{{ route('stupeni.list') }}">Ступени</a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="{{ route('zatirka.list') }}">Затирка для плитки</a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="{{ route('kleevye-smesi.list') }}">Клеевые смеси</a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="{{ route('santekhnika.list') }}">
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

                    <li class="dropdown "><a href="#">Услуги <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li class="dropdown position-static"><a href="{{ route('rezka') }}">Резка</a></li>
                            <li class="dropdown position-static">
                                <a href="{{ route('rospis') }}">Роспись плитки</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown ">
                        <a href="{{ route('category.list', 'keramogranit') }}">
                            Керамогранит <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="sub-menu">
                            @foreach ($patterns as $key => $pattern)
                            <li class="dropdown position-static">
                                <a
                                    href="{{ route('category.pattern', ['category' => 'keramogranit','pattern' => $pattern->slug]) }}">
                                    {{ $pattern->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="{{ route('plitka.list') }}">Плитка</a></li>
                    <li><a href="{{ route('mozaika.list') }}">Мозаика</a></li>

                    <li><a href="{{ route('partnerships') }}">Дизайнерам</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>