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
                        <li><span class="order-middle-left">Product Name X 1</span> <span class="order-price">$100 </span>
                        </li>
                        <li><span class="order-middle-left">Product Name X 1</span> <span class="order-price">$100 </span>
                        </li>
                    </ul>
                </div>

                <div class="your-order-total">
                    <ul>
                        <li class="order-total">Итого</li>
                        <li>$100</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row Place-order mt-25">
            <div class="col-md-6 mb-3 mb-md-0">
                <a class="btn-change" href="{{ route('cart') }}">Изменить</a>
            </div>
            <div class="col-md-6">
                <a class="btn-order" href="#">Заказать</a>
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
