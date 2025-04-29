<div class="tab-pane fade" id="featured">
    <div class="row mb-n-30px">
        @foreach ($products['mozaika'] as $product)
            <x-goods.product-card>
                <x-slot name="img" src="{{ $product->images->first() ? asset('storage/images/' . $product->images->first()->title) : asset('assets/images/stock/stock-image.png') }}"
                    alt="{{ $product->title }}">
                </x-slot>
                <x-slot name="category">{{ $product->category->title }}</x-slot>
                <x-slot name="id">{{ $product->id }}</x-slot>
                <x-slot name="title">{{ $product->title }}</x-slot>
                <x-slot name="price">{{ number_format($product->price, 2, '.', ' ') }}</x-slot>
                <x-slot name="sale">{{ $product->sale }}</x-slot>
                <x-slot name="urlProduct"
                    href="{{ route('product.show', [
                        'category' => $product->category->slug,
                        'slug' => $product->slug,
                        'sku' => $product->sku,
                    ]) }}">
                </x-slot>
                <x-slot name="urlCategory" href="{{ route('category.list', $product->category->slug) }}">
                </x-slot>
            </x-goods.product-card>
        @endforeach
    </div>
</div>
