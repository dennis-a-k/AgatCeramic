<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('orders.list') }}" class="brand-link pb-2">
        <div class="row ml-3">
            <img src="{{ asset('assets/images/stock/logo.svg') }}" class="col-2 pr-0" alt="logo">
            <div class="col-10 brand-text">
                <p class="m-0 h6"><strong>Agat<span style="color: #8a8a8a">Ceramic</span></strong></p>
                <p class="font-weight-light m-0 h6 text-info">Админ-панель</p>
            </div>
        </div>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-info"><strong>Заказы</strong></li>
                <li class="nav-item">
                    <a href="{{ route('orders.list') }}" class="nav-link">
                        <i class="fas fa-boxes nav-icon"></i>
                        <p>
                            Список заказов
                            @if ($pendingOrdersCount > 0)
                                <span class="badge badge-info right">
                                    {{ $pendingOrdersCount }}
                                </span>
                            @endif
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('calls.list') }}" class="nav-link">
                        <i class="fas fa-phone nav-icon"></i>
                        <p>
                            Заявки перезвонить
                            @if ($pendingCallsCount > 0)
                                <span class="badge badge-info right">
                                    {{ $pendingCallsCount }}
                                </span>
                            @endif
                        </p>
                    </a>
                </li>

                <li class="nav-header text-info"><strong>Товары</strong></li>
                <li class="nav-item">
                    <a href="{{ route('goods.list') }}" class="nav-link">
                        <i class="fas fa-layer-group nav-icon"></i>
                        <p>Список товаров</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product.create') }}" class="nav-link">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Добавить товар</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-ul nav-icon"></i>
                        <p>
                            Характеристики
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Категория</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sizes.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Размер</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pattern.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Узор</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('texture.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Поверхность</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('color.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Цвет</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brands.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Производитель</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('collection.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Коллекция</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('country.list') }}" class="nav-link">
                                <i class="fas fa-genderless nav-icon"></i>
                                <p>Страна</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('editor') }}" class="nav-link">
                        <i class="fas fa-pencil-alt nav-icon"></i>
                        <p>Редактирование</p>
                    </a>
                </li>

                @if (auth()->user()->role === 'admin')
                    <li class="nav-header text-info"><strong>Пользователи</strong></li>
                    <li class="nav-item">
                        <a href="{{ route('users') }}" class="nav-link">
                            <i class="fas fa-user-friends nav-icon"></i>
                            <p>Администраторы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Добавить</p>
                        </a>
                    </li>
                @endif

                <li class="nav-header text-info"><strong>Данные сайты</strong></li>
                <li class="nav-item">
                    <a href="{{ route('app.data') }}" class="nav-link">
                        <i class="fas fa-address-card nav-icon"></i>
                        <p>
                            Добавить данные
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
