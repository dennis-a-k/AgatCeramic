<section class="col-md-6">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Данные о товаре</h3>
        </div>

        <div class="card-body bg-light">
            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputTitle">Наименование <small
                            class="text-red">(обязательно)</small></label>
                    <input type="text" id="inputTitle"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                        value="{{ old('title', $product->title) }}" required autocomplete="title">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label class="text-black-50" for="inputProductCode">Код товара</label>
                    <input type="text" id="inputProductCode"
                        class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" name="product_code"
                        value="{{ old('product_code', $product->product_code) }}" autocomplete="product_code">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('product_code')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="unit" value="шт"
                        {{ $product->unit == 'шт' ? 'checked' : '' }}>
                    <label for="customRadio1" class="custom-control-label">штука</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="unit" value="м2"
                        {{ $product->unit == 'м2' ? 'checked' : '' }}>
                    <label for="customRadio2" class="custom-control-label">метр квадратный</label>
                </div>
            </div>

            <div class="form-group">
                <label class="text-black-50" for="summernote">Описание</label>
                <textarea class="form-control" id="summernote" name="description" rows="16">{{ old('description', $product->description) }}</textarea>
            </div>
        </div>
    </div>
</section>
