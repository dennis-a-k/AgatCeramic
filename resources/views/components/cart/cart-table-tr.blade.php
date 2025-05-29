@props(['id', 'img', 'url', 'title', 'price', 'quantity', 'unit', 'weight_kg', 'category'])

<tr data-product-id="{{ $id }}">
    <td class="product-thumbnail px-2">
        <div style="aspect-ratio: 1 / 1; overflow: hidden;">
            <a href="{{ $url }}"><img class="img-responsive" src="{{ $img }}" alt="{!! $title !!}" /></a>
        </div>
    </td>
    <td class="product-name">
        <a href="{{ $url }}" class="lh-1">
            <p>{!! $title !!} @if ($weight_kg)
                    {!! $weight_kg !!} кг
                @endif
            </p>
        </a>
    </td>
    <td class="product-price-cart"><span class="amount">{{ number_format($price, 2, '.', ' ') }} &#8381;</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $quantity }}" />
        </div>
    </td>
    <td>
        @if ($unit === 'шт')
            шт.
        @else
            м<sup>2</sup>
        @endif
    </td>
    <td class="product-subtotal">{{ number_format($price * $quantity, 2, '.', ' ') }} &#8381;</td>
    <td class="product-remove">
        <a href="#"><i class="fa fa-times"></i></a>
    </td>
</tr>
