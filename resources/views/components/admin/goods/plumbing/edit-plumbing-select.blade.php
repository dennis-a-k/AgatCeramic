<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Дополнительные характеристики</h3>
    </div>

    <div class="card-body bg-light">
        <div class="form-group">
            <label class="text-black-50" for="selectCategoryPlumbing">Категория</label>
            <select class="form-control select2" style="width: 100%;" id="selectCategoryPlumbing" name="category_id">
                <option selected="selected" disabled>Выберете категорию</option>
                @foreach ($plumbing->children as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="subcategoryWrapper" style="display: none;">
            <label class="text-black-50" for="selectSubcategoryPlumbing">Подкатегория</label>
            <select class="form-control select2" style="width: 100%;" id="selectSubcategoryPlumbing" name="subcategory_id">
                <option selected="selected" disabled>Сначала выберите категорию</option>
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectColorsGlue">Цвет</label>
            <select class="form-control select2" style="width: 100%;" id="selectColorsGlue" name="color_id">
                <option selected="selected" disabled>Выберете цвет</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}" @selected(old('color_id', $product->color_id) == $color->id)>{{ $color->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectBrandsGlue">Производитель</label>
            <select class="form-control select2" style="width: 100%;" id="selectBrandsGlue" name="brand_id">
                <option selected="selected" disabled>Выберете производителя</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="selectCountryGlue">Страна</label>
            <select class="form-control select2" style="width: 100%;" id="selectCountryGlue" name="country_id">
                <option selected="selected" disabled>Выберете страну</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @selected(old('country_id', $product->country_id) == $country->id)>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
