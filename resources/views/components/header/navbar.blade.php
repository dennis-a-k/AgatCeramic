<nav class="header-nav-area d-none d-lg-block sticky-nav">
    <div class="container">
        <div class="header-nav">
            <div class="main-menu position-relative">
                <ul>
                    <li class="dropdown"><a href="#">Каталог <i class="fa fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', config('categories.klinker')) ? route('category.list', $categories->firstWhere('title', config('categories.klinker'))->slug) : 404 }}">
                                    {{ config('categories.klinker') }}
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', config('categories.stupeni')) ? route('category.list', $categories->firstWhere('title', config('categories.stupeni'))->slug) : 404 }}">
                                    {{ config('categories.stupeni') }}
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', config('categories.zatirka')) ? route('category.list', $categories->firstWhere('title', config('categories.zatirka'))->slug) : 404 }}">
                                    {{ config('categories.zatirka') }}
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a
                                    href="{{ $categories->contains('title', config('categories.kleya')) ? route('category.list', $categories->firstWhere('title', config('categories.kleya'))->slug) : 404 }}">
                                    {{ config('categories.kleya') }}
                                </a>
                            </li>
                            <li class="dropdown position-static">
                                <a href="#">
                                    {{ config('categories.santexnika') }}
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                <ul class="sub-menu sub-menu-2">
                                    @foreach ($plumbing->children->sortBy('title') as $child)
                                        <li><a href="{{ route('plumbing.category', $child->slug) }}">{{ $child->title }}</a></li>
                                    @endforeach
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
                            href="{{ $categories->contains('title', config('categories.keramogranit')) ? route('category.list', $categories->firstWhere('title', config('categories.keramogranit'))->slug) : 404 }}">
                            {{ config('categories.keramogranit') }}
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ $categories->contains('title', config('categories.plitka')) ? route('category.list', $categories->firstWhere('title', config('categories.plitka'))->slug) : 404 }}">
                            {{ config('categories.plitka') }}
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ $categories->contains('title', config('categories.mozaika')) ? route('category.list', $categories->firstWhere('title', config('categories.mozaika'))->slug) : 404 }}">
                            {{ config('categories.mozaika') }}
                        </a>
                    </li>

                    <li><a href="{{ route('partnerships') }}" target="_blunk">Дизайнерам</a></li>
                    <li><a href="{{ route('partnerships2') }}" target="_blunk">Дизайнерам 2</a></li>

                    <li><a href="{{ route('contact') }}">Контакты</a></li>

                    <li><a href="{{ route('sale') }}" class="text-danger">Распродажа</a></li>

                    <li><a href="{{ route('orders.list') }}">Админка</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
