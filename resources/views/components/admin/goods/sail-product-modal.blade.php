@if ($product->sale == 1)
    <span class="badge badge-danger" type="button" id="dropdownMenuProduct11" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Распродажа
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct11">
        <form method="POST" action="{{ route('product.update.sale', $product->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="sale" value="0">
                Скрыть с распродажи
            </button>
        </form>
    </div>
@else
    <span class="badge badge-secondary" type="button" id="dropdownMenuProduct01" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Не распродажа
    </span>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuProduct01">
        <form method="POST" action="{{ route('product.update.sale', $product->id) }}">
            @csrf
            @method('PATCH')
            <button class="dropdown-item" type="submit" name="sale" value="1">
                В распродажу
            </button>
        </form>
    </div>
@endif
