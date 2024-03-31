@if ($product->is_published == 1)
    <span class="badge badge-success" type="button" id="dropdownMenuProduct1" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Опубликован
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct1">
        <form method="POST" action="{{ route('product.update.published', $product->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="is_published" value="0">
                Скрыть товар
            </button>
        </form>
    </div>
@else
    <span class="badge badge-secondary" type="button" id="dropdownMenuProduct0" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Скрыт
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct0">
        <form method="POST" action="{{ route('product.update.published', $product->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="is_published" value="1">
                Показать товар
            </button>
        </form>
    </div>
@endif
