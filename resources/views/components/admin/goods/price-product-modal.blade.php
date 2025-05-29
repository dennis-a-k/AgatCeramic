<span type="button" id="dropdownMenuPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ number_format($product->price, 2, '.', ' ') }} &#8381;
</span>

<div class="dropdown-menu px-1" style="width: 10rem" aria-labelledby="dropdownMenuPrice">
    <form method="POST" action="{{ route('product.update.price', $product->id) }}">
        @csrf
        @method('PATCH')
        <div class="input-group">
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" min="0.00" step="0.01" pattern="^\d+(?:\.\d{10,2})?$" required>
            <div class="input-group-append">
                <button class="btn btn-info btn-sm" type="submit">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </div>
        </div>
        <x-error.input-error class="ml-2" :messages="$errors->get('price')" />
    </form>
</div>
