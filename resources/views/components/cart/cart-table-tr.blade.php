<tr data-product-id="{{ $id }}">
    <td class="product-thumbnail">
        <a {{ $url->attributes }}><img class="img-responsive ml-15px" {{ $img->attributes }} /></a>
    </td>
    <td class="product-name"><a {{ $url->attributes }}>{{ $title }}</a></td>
    <td class="product-price-cart"><span class="amount">{{ $price }} &#8381;</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus">
            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $quantity }}" />
        </div>
    </td>
    <td class="product-subtotal">70.00 &#8381;</td>
    <td class="product-remove">
        <a href="#"><i class="fa fa-times"></i></a>
    </td>
</tr>
