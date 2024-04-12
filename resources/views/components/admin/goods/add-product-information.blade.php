<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Данные о товаре</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div>
                    <label for="inputArticle">Артикул <small class="text-red">(обязательно)</small></label>
                    <input type="text" id="inputArticle"
                        class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}" name="article"
                        value="{{ old('article') }}" required autofocus autocomplete="article">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('article')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputTitle">Наименование <small class="text-red">(обязательно)</small></label>
                    <input type="text" id="inputTitle"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                        value="{{ old('title') }}" required autocomplete="title">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputProductCode">Код товара</label>
                    <input type="text" id="inputProductCode"
                        class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" name="product_code"
                        value="{{ old('product_code') }}" required autocomplete="product_code">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('product_code')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputPrice">Цена</label>
                    <input type="number" id="inputPrice"
                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price"
                        value="{{ old('price') }}" min="0.00" step="0.01" pattern="^\d+(?:\.\d{10,2})?$"
                        required autocomplete="price">
                    {{-- <x-input-error class="ml-2" :messages="$errors->get('price')" /> --}}
                </div>
            </div>

            <div class="form-group">
                <label for="summernote">Описание</label>
                <textarea class="form-control" id="summernote" name="description"></textarea>
            </div>
        </div>
    </div>
</section>
