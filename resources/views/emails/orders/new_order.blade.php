@component('mail::message')
    # Новый заказ!

    Получен новый заказ #{{ $order->order_number }}

    ## Информация о клиенте:
    - **Имя:** {{ $order->customer_name }}
    - **Email:** {{ $order->customer_email }}
    - **Телефон:** {{ $order->customer_phone }}
    - **Адрес доставки:** {{ $order->shipping_address }}

    @if ($order->comment)
        **Комментарий к заказу:**
        {{ $order->comment }}
    @endif

    ## Детали заказа:

    @component('mail::table')
        | Товар | Количество | Цена | Сумма |
        |:------|:-----------|:-----|:------|
        @foreach ($order->items as $item)
            | {{ $item->product_title }} | {{ $item->quantity }} | {{ $item->price }} ₽ | {{ $item->subtotal }} ₽ |
        @endforeach
    @endcomponent

    **Итого: {{ $order->total_amount }} ₽**

    @component('mail::button', ['url' => config('app.url') . '/admin/orders/' . $order->id])
        Просмотреть заказ
    @endcomponent

    С уважением,<br>
    {{ config('app.name') }}
@endcomponent
