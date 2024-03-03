<div class="product">
    <span class="badges">
        <span class="new">Sale</span>
    </span>
    <div class="thumb">
        <a {{ $urlProduct->attributes }} class="image">
            <img {{ $img->attributes }} />
            <img class="hover-image" {{ $img->attributes }} />
        </a>
    </div>
    <div class="content">
        <span class="category"><a {{ $urlCategory->attributes }}>{{ $category }}</a></span>

        <h5 class="title">
            <a {{ $urlProduct->attributes }}>{{ $title }}</a>
        </h5>
        <span class="price">
            <span class="new">{{ $price }} &#8381;</span>
        </span>
    </div>
    <div class="actions">
        <button title="Купить" class="action add-to-cart">
            <i class="pe-7s-cart"></i>
        </button>

        <button class="action quickview" data-link-action="quickview" title="Посмотреть" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            <i class="pe-7s-look"></i>
        </button>
    </div>
</div>
