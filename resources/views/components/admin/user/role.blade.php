@if ($user->role === 'admin')
    <span class="btn btn-warning btn-xs" type="button" id="dropdownMenuProduct1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Администратор
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct1">
        <form method="POST" action="{{ route('users.update.role', $user->id) }}">
            @csrf
            @method('PUT')
            <button class="dropdown-item" type="submit" name="role" value="user">
                Сделать пользователем
            </button>
        </form>
    </div>
@else
    <span class="btn btn-info btn-xs" type="button" id="dropdownMenuProduct0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Пользователь
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct0">
        <form method="POST" action="{{ route('users.update.role', $user->id) }}">
            @csrf
            @method('PUT')
            <button class="dropdown-item" type="submit" name="role" value="admin">
                Сделать администратором
            </button>
        </form>
    </div>
@endif
