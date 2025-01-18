<form action="{{ $route }}" method="GET">
    <div class="input-group input-group-sm" style="width: {{ $width }};">
        <input type="text" name="search" class="form-control float-right" placeholder="{{ $placeholder }}"
            value="{{ request('search') }}">

        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
            @if (request('search'))
                <a href="{{ $route }}" class="btn btn-default">
                    <i class="fas fa-times"></i>
                </a>
            @endif
        </div>
    </div>
</form>
