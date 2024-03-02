<div {{ $attributes->class('single-banner') }}>
    <img {{ $img->attributes }}>
    <div {{ $title->attributes->class('banner-content') }}>
        <h3 class="title">{{ $title }}</h3>
        <span class="category">{{ $category }}</span>
        <a {{ $btn->attributes }} class="shop-link"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>
</div>
