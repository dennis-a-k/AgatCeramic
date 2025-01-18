<ul class="pagination pagination-sm m-0 float-right">
    <li class="page-item {{ $items->currentPage() == 1 ? 'disabled' : '' }}">
        <a class="page-link"
            href="{{ $items->appends([
                    'search' => request('search'),
                    'sort' => request('sort'),
                    'direction' => request('direction'),
                ])->url(1) }}">&laquo;</a>
    </li>

    @for ($i = 1; $i <= $items->lastPage(); $i++)
        <li class="page-item {{ $items->currentPage() == $i ? 'active' : '' }}">
            <a class="page-link"
                href="{{ $items->appends([
                        'search' => request('search'),
                        'sort' => request('sort'),
                        'direction' => request('direction'),
                    ])->url($i) }}">{{ $i }}</a>
        </li>
    @endfor

    <li class="page-item {{ $items->currentPage() == $items->lastPage() ? 'disabled' : '' }}">
        <a class="page-link"
            href="{{ $items->appends([
                    'search' => request('search'),
                    'sort' => request('sort'),
                    'direction' => request('direction'),
                ])->url($items->lastPage()) }}">&raquo;</a>
    </li>
</ul>
