<div class="col-lg-6 mt-md-30px mt-lm-30px ">
    <div class="your-order-area">
        <h3>Ваш заказ</h3>
        <div class="your-order-wrap gray-bg-4">
            <div class="your-order-product-info">
                <div class="your-order-top">
                    <ul>
                        <li>Товар</li>
                        <li>Стоимость</li>
                    </ul>
                </div>
                <div class="your-order-middle">
                    @foreach ($cart as $item)
                        <div class="row align-items-center lh-1 mb-3">
                            <div class="col-7">
                                <span class="order-middle-left">
                                    {{ $item['title'] }}
                                    @if (isset($item['weight_kg']))
                                        {{ $item['weight_kg'] }} кг
                                    @endif
                                </span>
                            </div>
                            <div class="col-2 text-end">
                                × {{ $item['quantity'] }}
                                @if ($item['unit'] === 'шт')
                                    шт.
                                @else
                                    м<sup>2</sup>
                                @endif
                            </div>
                            <div class="col-3 text-end">
                                <span class="order-price">{{ number_format($item['price'] * $item['quantity'], 2, '.', ' ') }}
                                    &#8381;
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="your-order-total">
                    <ul>
                        <li class="order-total">Итого</li>
                        <li>{{ number_format($total, 2, '.', ' ') }} &#8381;</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row Place-order mt-25">
            <div class="col-md-6 mb-3 mb-md-0">
                <a class="btn-change" href="{{ route('cart') }}">Изменить</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn-order" style="width: 100%;">Заказать</button>
            </div>
        </div>

        <div class="your-order-foot mt-3">
            <p class="text-end">
                Нажимая кнопку «Заказать», я даю <a href="{{ route('personal-data') }}" target="_blank">согласие</a> на
                обработку персональных данных, в соответствии с <a href="{{ route('policy') }}" target="_blank">Политикой</a>
            </p>
        </div>
    </div>
</div>
