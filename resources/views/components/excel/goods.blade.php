<table>
    <thead>
        <tr height="50">
            <th width="15" style="border:1px solid #8EAADB; background-color:#1F3765">Артикул</th>
            <th width="40" style="border:1px solid #8EAADB; background-color:#1F3765">Наименование</th>
            <th width="15" style="border:1px solid #8EAADB; background-color:#1F3765">Цена</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#F2F7FF">Код товара</th>
            <th width="40" style="border:1px solid #8EAADB; background-color:#F2F7FF">Описание</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Категория</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Размер</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Цвет</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Узор</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Поверхность</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Производитель</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Коллекция</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Страна</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Единица измерения</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#F2F7FF">Статус</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#F2F7FF">Распродажа</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#F2F7FF">Дата создания</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Фото 1</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Фото 2</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Фото 3</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Фото 4</th>
            <th width="20" style="border:1px solid #8EAADB; background-color:#B4C6E7">Фото 5</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($goods as $product)
            <tr>
                <th>{{ $product->sku }}</th>
                <th>{{ $product->title }}</th>
                <th>{{ $product->price }}</th>
                <th>{{ $product->product_code }}</th>
                <th>{{ $product->description }}</th>
                <th>{{ $product->category->title }}</th>
                <th>{{ $product->size->title ?? '' }}</th>
                <th>{{ $product->color->title ?? '' }}</th>
                <th>{{ $product->pattern->title ?? '' }}</th>
                <th>{{ $product->texture->title ?? '' }}</th>
                <th>{{ $product->brand->title ?? '' }}</th>
                <th>{{ $product->collection->title ?? '' }}</th>
                <th>{{ $product->country->name ?? '' }}</th>
                <th>{{ $product->unit }}</th>
                <th>
                    @if ($product->is_published === 1)
                        Опубликован
                    @else
                        Скрыт
                    @endif
                </th>
                <th>
                    @if ($product->sale === 1)
                        Распродажа
                    @else
                        Не распродажа
                    @endif
                </th>
                <th>{{ $product->created_at }}</th>
                @foreach ($product->images as $img)
                    <th>{{ asset('storage/images/' . $img->title) }}</th>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
