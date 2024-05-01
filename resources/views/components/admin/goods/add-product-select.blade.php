<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Дополнительные характеристики</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label class="text-black-50" for="selectCategories">Категория</label>
                <select class="form-control select2" style="width: 100%;" id="selectCategories" name="category_id">
                    <option selected="selected" disabled>Выберете категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectSizes">Размер</label>
                <select class="form-control select2" style="width: 100%;" id="selectSizes" name="size_id">
                    <option selected="selected" disabled>Выберете размер</option>
                    @foreach ($sizes as $size)
                        <option value="{{ $size->id }}" @selected(old('size_id') == $size->id)>{{ $size->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectPattern">Узор</label>
                <select class="form-control select2" style="width: 100%;" id="selectPattern" name="pattern_id">
                    <option selected="selected" disabled>Выберете узор</option>
                    @foreach ($patterns as $pattern)
                        <option value="{{ $pattern->id }}" @selected(old('pattern_id') == $pattern->id)>{{ $pattern->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectTexture">Поверхность</label>
                <select class="form-control select2" style="width: 100%;" id="selectTexture" name="texture_id">
                    <option selected="selected" disabled>Выберете поверхность</option>
                    @foreach ($textures as $texture)
                        <option value="{{ $texture->id }}" @selected(old('texture_id') == $texture->id)>{{ $texture->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectColors">Цвет</label>
                <select class="form-control select2" style="width: 100%;" id="selectColors" name="color_id">
                    <option selected="selected" disabled>Выберете цвет</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" @selected(old('color_id') == $color->id)>{{ $color->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectBrands">Производитель</label>
                <select class="form-control select2" style="width: 100%;" id="selectBrands" name="brand_id">
                    <option selected="selected" disabled>Выберете производителя</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectCollection">Коллекция</label>
                <select class="form-control select2" style="width: 100%;" id="selectCollection" name="collection_id">
                    <option selected="selected" disabled>Выберете коллекцию</option>
                    @foreach ($collections as $collection)
                        <option value="{{ $collection->id }}" @selected(old('collection_id') == $collection->id)>
                            {{ $collection->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="selectCountry">Страна</label>
                <select class="form-control select2" style="width: 100%;" id="selectCountry" name="country_id">
                    <option selected="selected" disabled>Выберете страну</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @selected(old('country_id') == $country->id)>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</section>
