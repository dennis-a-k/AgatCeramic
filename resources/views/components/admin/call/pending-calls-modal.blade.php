@if ($call->status === 'pending')
    <span class="badge badge-warning" type="button" id="dropdownMenuCall1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        заявка перезвонить
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuCall1">
        <form method="POST" action="{{ route('call.update.status', $call->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="status" value="viewed">
                просмотрен
            </button>
        </form>
    </div>
@else
    <span class="badge badge-light" type="button" id="dropdownMenuCall0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        просмотрен
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuCall0">
        <form method="POST" action="{{ route('call.update.status', $call->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="status" value="pending">
                не просмотрен
            </button>
        </form>
    </div>
@endif
