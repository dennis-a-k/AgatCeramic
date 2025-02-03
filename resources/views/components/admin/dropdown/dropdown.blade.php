<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user-circle text-info"></i>
        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <li class="user-footer">
            <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Профиль</a>
            <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right">Выйти</a>
        </li>
    </ul>
</li>
