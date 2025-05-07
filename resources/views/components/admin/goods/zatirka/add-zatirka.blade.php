<div class="card card-maroon card-outline">
    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false">
        <div class="card-header">
            <h4 class="card-title text-maroon w-100">
                Затирка для плитки
            </h4>
        </div>
    </a>
    <div id="collapseFive" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <form method="POST" action="{{ route('zatirka.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                                        <label class="text-black-50" for="inputPrice">Цена</label>
                                        <input type="number" id="inputPrice" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" value="{{ old('price') }}" min="0.00" step="0.01"
                                            pattern="^\d+(?:\.\d{10,2})?$" autocomplete="price">
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('price')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label class="text-black-50" for="inputWeight_kg">Вес (кг)</label>
                                        <input type="number" id="inputWeight_kg" class="form-control {{ $errors->has('weight_kg') ? 'is-invalid' : '' }}" name="weight_kg" value="{{ old('weight_kg') }}" min="0.00" step="0.01"
                                            pattern="^\d+(?:\.\d{10,2})?$" autocomplete="weight_kg">
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('weight_kg')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="inputWeight_kg">Использовать в качестве клея</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio3" name="glue" value="да">
                                        <label for="customRadio3" class="custom-control-label">Да</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio4" name="glue" value="нет" checked>
                                        <label for="customRadio4" class="custom-control-label">Нет</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="summernote">Описание</label>
                                    <textarea class="form-control" id="summernote" name="description" rows="9">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group d-none">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio9" name="unit" value="шт" checked>
                                        <label for="customRadio9" class="custom-control-label">штука</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Дополнительные характеристики</h3>
                            </div>

                            <div class="card-body bg-light">
                                <div class="form-group">
                                    <label class="text-black-50" for="selectCategories">Категория</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectCategories" name="category_id">
                                        <option selected="selected" disabled>Выберите категорию</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectMixture">Тип смеси</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectMixture" name="mixture_type">
                                        <option selected="selected" disabled>Выберите тип смеси</option>
                                        <option value="Добавка к затирке" @selected(old('mixture_type'))>Добавка к затирке</option>
                                        <option value="Силиконовая" @selected(old('mixture_type'))>Силиконовая</option>
                                        <option value="Цементная" @selected(old('mixture_type'))>Цементная</option>
                                        <option value="Эпоксидная" @selected(old('mixture_type'))>Эпоксидная</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectSeam">Ширина шва (мм)</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectSeam" name="seam">
                                        <option selected="selected" disabled>Выберите ширину шва</option>
                                        <option value="1-10" @selected(old('seam'))>1-10 мм</option>
                                        <option value="1-15" @selected(old('seam'))>1-15 мм</option>
                                        <option value="1-6" @selected(old('seam'))>1-6 мм</option>
                                        <option value="1-7" @selected(old('seam'))>1-7 мм</option>
                                        <option value="2-20" @selected(old('seam'))>2-20 мм</option>
                                        <option value="3-10" @selected(old('seam'))>3-10 мм</option>
                                        <option value="5-20" @selected(old('seam'))>5-20 мм</option>
                                        <option value="5-30" @selected(old('seam'))>5-30 мм</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectColors">Цвет</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectColors" name="color_id">
                                        <option selected="selected" disabled>Выберите цвет</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" @selected(old('color_id') == $color->id)>{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectBrands">Производитель</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectBrands" name="brand_id">
                                        <option selected="selected" disabled>Выберите производителя</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectCountry">Страна</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectCountry" name="country_id">
                                        <option selected="selected" disabled>Выберите страну</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @selected(old('country_id') == $country->id)>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Фото товара
                                    <i class="far fa-question-circle text-info images"></i>
                                </h3>
                            </div>

                            <div class="card-body bg-light">
                                <div class="form-group">
                                    <label class="text-black-50" for="customFile">Главное фото</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]" multiple>
                                        <label class="custom-file-label" for="customFile" data-browse="Выбрать">Загрузите фото</label>
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="file2">Фото №2</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file2" accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]" multiple>
                                        <label class="custom-file-label" for="file2" data-browse="Выбрать">Загрузите фото</label>
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.1')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="file3">Фото №3</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file3" accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]" multiple>
                                        <label class="custom-file-label" for="file3" data-browse="Выбрать">Загрузите фото</label>
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.2')" /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        @if (session('status') === 'product-created')
                            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Товар создан</span>
                        @endif

                        <button type="submit" class="btn btn-info float-right">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
