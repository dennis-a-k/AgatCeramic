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
                <x-error.input-error class="ml-2" :messages="$errors->get('title')" />
            </div>
        </div>

        <div class="form-group">
            <div>
                <label class="text-black-50" for="inputDimensions">Габариты (см)</label>
                <input type="text" id="inputDimensions" class="form-control {{ $errors->has('dimensions') ? 'is-invalid' : '' }}" name="dimensions"
                    value="{{ old('dimensions', $product->attributes['dimensions']) }}" autocomplete="dimensions">
                <x-error.input-error class="ml-2" :messages="$errors->get('dimensions')" />
            </div>
        </div>

        <div class="form-group">
            <label class="text-black-50" for="summernote">Описание</label>
            <textarea class="form-control" id="summernote" name="description" rows="16">{{ old('description', $product->description) }}</textarea>
        </div>
    </div>
</div>
