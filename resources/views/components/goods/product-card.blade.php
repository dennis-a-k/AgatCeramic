<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
    <div class="product card h-100" style="border: none">
        @if ($sale == '1')
            <span class="badges">
                <span class="new">Sale</span>
            </span>
        @endif

        <div class="thumb d-flex justify-content-center align-items-center" style="aspect-ratio: 1 / 1;">
            <a {{ $urlProduct->attributes }} class="image">
                <img {{ $img->attributes }} />
                <img class="hover-image" {{ $img->attributes }} />
            </a>
        </div>
        <div class="content text-center">
            <span class="category"><a {{ $urlCategory->attributes }}>{{ $category }}</a></span>

            <span class="price">
                <span class="new">{{ $price }} &#8381;</span>
            </span>

            <h5 class="title">
                <a {{ $urlProduct->attributes }}>{{ Str::words($title, 15) }}</a>
            </h5>
        </div>
        <div class="actions">
            <button class="action add-cart" data-product-id="{{ $id }}">
                <i class="pe-7s-cart"></i>
            </button>

            <button class="action quickview" data-link-action="quickview" title="Посмотреть" data-id="{{ $id ?? null }}" data-bs-toggle="modal" data-bs-target="#modalProduct">
                <i class="pe-7s-look"></i>
            </button>
        </div>
    </div>
</div>
