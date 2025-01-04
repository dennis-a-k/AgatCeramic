@component('mail::message')
    # Спасибо за заказ!

    Номер вашего заказа: {{ $order->order_number }}

    ## Детали заказа:

    @component('mail::table')
        | Товар | Количество | Цена |
        |:------|:-----------|:-----|
        @foreach ($order->items as $item)
            | {{ $item->product_title }} | {{ $item->quantity }} | {{ $item->price }} ₽ |
        @endforeach
    @endcomponent

    **Итого: {{ $order->total_amount }} ₽**

    ## Информация о доставке:
    {{ $order->shipping_address }}

    Мы свяжемся с вами в ближайшее время для подтверждения заказа.

    С уважением,<br>
    {{ config('app.name') }}
@endcomponent
