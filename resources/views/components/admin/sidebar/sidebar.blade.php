<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Админ-панель</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Пользователи</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Список
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Администраторы</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-friends nav-icon"></i>
                                <p>Клиенты</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Добавить</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Товары</li>
                <li class="nav-item">
                    <a href="{{ route('goods.list') }}" class="nav-link">
                        <i class="fas fa-layer-group nav-icon"></i>
                        <p>Список товаров</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.list') }}" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Категории</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sizes.list') }}" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Размеры</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pattern.list') }}" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Узор</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-plus-square nav-icon"></i>
                        <p>Добавить товар</p>
                    </a>
                </li>

                <li class="nav-header">Заказы</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="fas fa-list-ul nav-icon"></i>
                        <p>
                            Список заказов
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
