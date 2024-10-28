<div class="description-review-wrapper">
    <div class="description-review-topbar nav">
        <button data-bs-toggle="tab" data-bs-target="#des-details2">Характеристики</button>
        <button class="active" data-bs-toggle="tab" data-bs-target="#des-details1">Описание</button>
    </div>
    <div class="tab-content description-review-bottom">
        <div id="des-details2" class="tab-pane">
            <div class="product-anotherinfo-wrapper text-start d-flex">
                <ul>
                    <li><span>Категория:</span></li>
                    <li><span>Размер:</span></li>
                    <li><span>Цвет:</span></li>
                    <li><span>Поверхность:</span></li>
                    <li><span>Узор:</span></li>
                    <li><span>Страна:</span></li>
                    <li class="product-anotherinfo-img">
                        @if (!$product->brand?->img)
                        <span></span>
                        @else
                        <a href="">
                            <img src="{{ asset('storage/brands/' . $product->brand->img) }}"
                                alt="{{ $product->brand->title }}">
                        </a>
                        @endif
                    </li>
                </ul>

                <ul>
                    <li>
                        <a
                            href="{{ $product->category?->slug ? route('category.list', $product->category->slug) : '#' }}">
                            {{ $product->category?->title ?? '---' }}
                        </a>
                    </li>
                    <li>{{ $product->size?->title ?? '---' }}</li>
                    <li>{{ $product->color?->title ?? '---' }}</li>
                    <li>{{ $product->texture?->title ?? '---' }}</li>
                    <li>{{ $product->pattern?->title ?? '---' }}</li>
                    <li>{{ $product->country?->name ?? '---' }}</li>
                </ul>
            </div>
        </div>
        <div id="des-details1" class="tab-pane active">
            <div class="product-description-wrapper">
                <p>{{ $product->description ?? '' }}</p>
            </div>
        </div>
    </div>
</div>
