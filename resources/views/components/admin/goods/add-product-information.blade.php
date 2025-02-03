<section class="col-md-6">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Данные о товаре</h3>
        </div>

        <div class="card-body bg-light">
            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputArticle">Артикул <small class="text-red">(обязательно)</small></label>
                    <input type="text" id="inputArticle" class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}" name="sku" value="{{ old('sku') }}" required autofocus
                        autocomplete="sku">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('sku')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputTitle">Наименование <small class="text-red">(обязательно)</small></label>
                    <input type="text" id="inputTitle" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autocomplete="title">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputProductCode">Код товара</label>
                    <input type="text" id="inputProductCode" class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" name="product_code" value="{{ old('product_code') }}"
                        autocomplete="product_code">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('product_code')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputPrice">Цена</label>
                    <input type="number" id="inputPrice" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" value="{{ old('price') }}" min="0.00" step="0.01"
                        pattern="^\d+(?:\.\d{10,2})?$" autocomplete="price">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('price')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="summernote">Описание</label>
                <textarea class="form-control" id="summernote" name="description" rows="9">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio1" name="unit" value="шт">
                    <label for="customRadio1" class="custom-control-label">штука</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio2" name="unit" value="м2" checked>
                    <label for="customRadio2" class="custom-control-label">метр квадратный</label>
                </div>
            </div>
        </div>
    </div>
</section>
