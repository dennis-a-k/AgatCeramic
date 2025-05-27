<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Данные о товаре</h3>
    </div>

    <div class="card-body bg-light">
        <div class="form-group">
            <div>
                <label class="text-black-50" for="inputTitle">Наименование <small class="text-red">(обязательно)</small></label>
                <input type="text" id="inputTitle" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title', $product->title) }}" required
                    autocomplete="title">
                {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
            </div>
        </div>

        <div class="form-group">
            <div>
                <label class="text-black-50" for="inputWeight_kg">Вес (кг)</label>
                <input type="number" id="inputWeight_kg" class="form-control {{ $errors->has('weight_kg') ? 'is-invalid' : '' }}" name="weight_kg"
                    value="{{ old('weight_kg', $product->attributes['weight_kg']) }}" min="0.00" step="0.01" pattern="^\d+(?:\.\d{10,2})?$" autocomplete="weight_kg">
                {{-- <x-input-error class="ml-2" :messages="$errors->get('weight_kg')" /> --}}
            </div>
        </div>

        <div class="form-group">
            <div>
                <label class="text-black-50" for="inputSeam">Ширина шва (мм)</label>
                <input type="text" id="inputSeam" class="form-control {{ $errors->has('seam') ? 'is-invalid' : '' }}" name="seam" value="{{ old('seam', $product->attributes['seam']) }}" autocomplete="seam">
                {{-- <x-input-error class="ml-2" :messages="$errors->get('seam')" /> --}}
            </div>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="inputWeight_kg">Использовать в качестве клея</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio3" name="glue" value="да"
                    {{ $product->attributes['glue'] == 'да' ? 'checked' : '' }}>
                <label for="customRadio3" class="custom-control-label">Да</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio4" name="glue" value="нет"
                    {{ $product->attributes['glue'] == 'нет' ? 'checked' : '' }}>
                <label for="customRadio4" class="custom-control-label">Нет</label>
            </div>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="summernote">Описание</label>
            <textarea class="form-control" id="summernote" name="description" rows="16">{{ old('description', $product->description) }}</textarea>
        </div>
    </div>
</div>
