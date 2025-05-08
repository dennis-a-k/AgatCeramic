<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Дополнительные характеристики</h3>
    </div>

    <div class="card-body bg-light">

        <div class="form-group">
            <label class="text-black-50" for="selectMixture">Тип смеси</label>
            <select class="form-control select2" style="width: 100%;" id="selectMixture" name="mixture_type">
                <option selected disabled>Выберите тип смеси</option>
                @foreach (['Добавка к затирке', 'Силиконовая', 'Цементная', 'Эпоксидная'] as $type)
                    <option value="{{ $type }}" @selected($product->attributes['mixture_type'] == $type)>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectSeam">Ширина шва (мм)</label>
            <select class="form-control select2" style="width: 100%;" id="selectSeam" name="seam">
                <option selected="selected" disabled>Выберите ширину шва</option>
                @foreach (['1-10', '1-15', '1-6', '1-7', '2-20', '3-10', '5-20', '5-30'] as $type)
                    <option value="{{ $type }}" @selected($product->attributes['seam'] == $type)>
                        {{ $type }} мм
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectColorsGrout">Цвет</label>
            <select class="form-control select2" style="width: 100%;" id="selectColorsGrout" name="color_id">
                <option selected="selected" disabled>Выберете цвет</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" @selected(old('color_id', $product->color_id) == $color->id)>{{ $color->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectBrandsGrout">Производитель</label>
            <select class="form-control select2" style="width: 100%;" id="selectBrandsGrout" name="brand_id">
                <option selected="selected" disabled>Выберете производителя</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectCountryGrout">Страна</label>
            <select class="form-control select2" style="width: 100%;" id="selectCountryGrout" name="country_id">
                <option selected="selected" disabled>Выберете страну</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @selected(old('country_id', $product->country_id) == $country->id)>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
