<div class="description-review-wrapper">
    <div class="description-review-topbar nav">
        <button data-bs-toggle="tab" data-bs-target="#des-details2">Характеристики</button>
        <button class="active" data-bs-toggle="tab" data-bs-target="#des-details1">Описание</button>
    </div>
    <div class="tab-content description-review-bottom">
        <div id="des-details2" class="tab-pane">
            <div class="product-anotherinfo-wrapper text-start d-flex">
                <ul>
                    @if ($product->category)
                        <li><span>Категория:</span></li>
                    @endif
                    @if ($product->subcategory)
                        <li><span>Тип:</span></li>
                    @endif
                    @if ($product->size)
                        <li><span>Размер:</span></li>
                    @endif
                    @if (isset($product->attributes['weight_kg']))
                        <li><span>Вес:</span></li>
                    @endif
                    @if (isset($product->attributes['glue']))
                        <li><span>Используется в качстве клея:</span></li>
                    @endif
                    @if (isset($product->attributes['mixture_type']))
                        <li><span>Тип смеси:</span></li>
                    @endif
                    @if (isset($product->attributes['seam']))
                        <li><span>Ширина шва:</span></li>
                    @endif
                    @if (isset($product->attributes['dimensions']))
                        <li><span>Габариты:</span></li>
                    @endif
                    @if ($product->color)
                        <li><span>Цвет:</span></li>
                    @endif
                    @if ($product->texture)
                        <li><span>Поверхность:</span></li>
                    @endif
                    @if ($product->pattern)
                        <li><span>Узор:</span></li>
                    @endif
                    @if ($product->country)
                        <li><span>Страна:</span></li>
                    @endif
                    @if ($product->brand?->img)
                        <li class="product-anotherinfo-img">
                            <a href="{{ route('brand.list', $product->brand->slug) }}">
                                <img src="{{ asset('storage/brands/' . $product->brand->img) }}" alt="{{ $product->brand->title }}">
                            </a>
                        </li>
                    @endif
                </ul>

                <ul>
                    @if ($product->category)
                        <li>
                            <a href="{{ $product->category?->slug ? route('category.list', $product->category->slug) : 404 }}">
                                {{ $product->category->title }}
                            </a>
                        </li>
                    @endif
                    @if ($product->subcategory)
                        <li>{{ $product->subcategory->title }}</li>
                    @endif
                    @if ($product->size)
                        <li>{{ $product->size->title }}</li>
                    @endif
                    @if (isset($product->attributes['weight_kg']))
                        <li>{{ $product->attributes['weight_kg'] }} кг</li>
                    @endif
                    @if (isset($product->attributes['glue']))
                        <li>{{ $product->attributes['glue'] }}</li>
                    @endif
                    @if (isset($product->attributes['mixture_type']))
                        <li>{{ $product->attributes['mixture_type'] }}</li>
                    @endif
                    @if (isset($product->attributes['seam']))
                        <li>{{ $product->attributes['seam'] }} мм</li>
                    @endif
                    @if (isset($product->attributes['dimensions']))
                        <li>{{ $product->attributes['dimensions'] }} см</li>
                    @endif
                    @if ($product->color)
                        <li>{{ $product->color->title }}</li>
                    @endif
                    @if ($product->texture)
                        <li>{{ $product->texture->title }}</li>
                    @endif
                    @if ($product->pattern)
                        <li>{{ $product->pattern->title }}</li>
                    @endif
                    @if ($product->country)
                        <li>{{ $product->country->name }}</li>
                    @endif
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
