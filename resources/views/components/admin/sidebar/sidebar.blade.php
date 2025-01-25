<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('orders.list') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Админ-панель</span>
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
                    <a href="{{ route('goods.editor') }}" class="nav-link">
                        <i class="fas fa-pencil-alt nav-icon"></i>
                        <p>Редактирование</p>
                    </a>
                </li>

                <li class="nav-header text-info"><strong>Пользователи</strong></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-friends nav-icon"></i>
                        <p>Администраторы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Добавить</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
