<div class="pro-details-categories-info pro-details-same-style d-flex m-0">
    <span>Артикул:</span>
    <ul class="d-flex">
        <li>
            {{ $product->sku }}
        </li>
    </ul>
</div>

<div class="pro-details-categories-info pro-details-same-style d-flex m-0">
    <span>Код товара: </span>
    <ul class="d-flex">
        <li>
            {{ $product->product_code ?? '---' }}
        </li>
    </ul>
</div>

<div class="pro-details-categories-info pro-details-same-style d-flex m-0">
    <span>Производитель: </span>
    <ul class="d-flex">
        <li><a href="">{{ $product->brand?->title ?? '---' }}</a></li>
    </ul>
</div>

<div class="pro-details-categories-info pro-details-same-style d-flex m-0">
    <span>Коллекция: </span>
    <ul class="d-flex">
        <li><a href="">{{ $product->collection?->title ?? '---' }}</a></li>
    </ul>
</div>
