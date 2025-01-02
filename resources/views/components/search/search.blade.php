<form action="{{ route('search') }}" method="GET">
    <input type="text" name="query" placeholder="Поиск" value="{{ request('query') }}" />
    <button type="submit"><i class="pe-7s-search"></i></button>
</form>
