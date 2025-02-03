@if ($paginator instanceof \Illuminate\Pagination\LengthAwarePaginator && $paginator->hasPages())
    <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
        <div class="pages">
            <ul>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="li disabled">
                        <a class="page-link"><i class="fa fa-angle-left"></i></a>
                    </li>
                @else
                    <li class="li">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                @endif

                @php
                    $window = 2; // Количество страниц с каждой стороны от текущей
                    $current = $paginator->currentPage();
                    $last = $paginator->lastPage();

                    $start = max(1, $current - $window);
                    $end = min($last, $current + $window);

                    if ($start > 1) {
                        echo '<li class="li"><a class="page-link" href="' . $paginator->url(1) . '">1</a></li>';
                        if ($start > 2) {
                            echo '<li class="li disabled"><a class="page-link">...</a></li>';
                        }
                    }
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="li">
                        <a class="page-link {{ $i == $current ? 'active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @php
                    if ($end < $last) {
                        if ($end < $last - 1) {
                            echo '<li class="li disabled"><a class="page-link">...</a></li>';
                        }
                        echo '<li class="li"><a class="page-link" href="' . $paginator->url($last) . '">' . $last . '</a></li>';
                    }
                @endphp

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="li">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                @else
                    <li class="li disabled">
                        <a class="page-link"><i class="fa fa-angle-right"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif
