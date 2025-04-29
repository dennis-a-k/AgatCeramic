<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Корзина</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                @forelse($cart as $item)
                    <li data-product-id="{{ $item['id'] }}">
                        <a href="{{ route('product.show', [
                            'category' => $item['category_slug'] ?? '',
                            'slug' => $item['slug'] ?? '',
                            'sku' => $item['sku'],
                        ]) }}"
                            class="image">
                            <img src="{{ asset($item['image']->first() ? asset('storage/images/' . $item['image']->first()->title) : asset('assets/images/stock/stock-image.png')) }}"
                                alt="{{ $item['title'] }}">
                        </a>
                        <div class="content">
                            <a href="{{ route('product.show', [
                                'category' => $item['category_slug'] ?? '',
                                'slug' => $item['slug'] ?? '',
                                'sku' => $item['sku'],
                            ]) }}"
                                class="title">
                                {{ $item['title'] }}
                            </a>
                            <span class="quantity-price">
                                {{ $item['quantity'] }}@if ($item['unit'] === 'шт')
                                    шт.
                                @else
                                    м<sup>2</sup>
                                @endif x
                                <span class="amount">{{ number_format($item['price'], 2, '.', ' ') }} &#8381;</span>
                            </span>
                            <a href="#" class="remove" data-product-id="{{ $item['id'] }}">×</a>
                        </div>
                    </li>
                    @empty
                        <li class="empty-cart">Корзина пуста</li>
                    @endforelse
                </ul>
            </div>
            @if (count($cart) > 0)
                <div class="foot">
                    <div class="sub-total">
                        <strong>Итого:</strong>
                        <span class="amount">{{ number_format($total, 2, '.', ' ') }} &#8381;</span>
                    </div>
                    <div class="buttons mt-30px">
                        <a href="{{ route('cart') }}" class="btn mb-30px">Перейти в корзину</a>
                        <a href="{{ route('checkout') }}" class="btn current-btn">Оформить заказ</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
