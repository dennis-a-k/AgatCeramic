<div class="col-lg-5 mt-md-30px mt-lm-30px ">
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
                    <ul>
                        @foreach ($cart as $item)
                            <li>
                                <span class="order-middle-left">{{ $item['title'] }} × {{ $item['quantity'] }}</span>
                                <span class="order-price">{{ number_format($item['price'] * $item['quantity'], 2) }}
                                    &#8381;
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="your-order-total">
                    <ul>
                        <li class="order-total">Итого</li>
                        <li>{{ number_format($total, 2) }} &#8381;</li>
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
                обработку персональных данных, в соответствии с <a href="{{ route('policy') }}"
                    target="_blank">Политикой</a>
            </p>
        </div>
    </div>
</div>
