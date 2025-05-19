<div class="card card-primary card-outline">
    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseSixe" aria-expanded="false">
        <div class="card-header">
            <h4 class="card-title text-primary w-100">
                Добавить сантехнику
            </h4>
        </div>
    </a>
    <div id="collapseSixe" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <form method="POST" action="{{ route('plumbing.store') }}" enctype="multipart/form-data">
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
                                        <label class="text-black-50" for="inputTitle">Наименование <small class="text-red">(обязательно)</small></label>
                                        <input type="text" id="inputTitle" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required
                                            autocomplete="title">
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label class="text-black-50" for="inputPrice">Цена</label>
                                        <input type="number" id="inputPrice" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" value="{{ old('price') }}"
                                            min="0.00" step="0.01" pattern="^\d+(?:\.\d{10,2})?$" autocomplete="price">
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('price')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <label class="text-black-50" for="inputDimensions">Габариты (см)</label>
                                        <input type="number" id="inputDimensions" class="form-control {{ $errors->has('dimensions') ? 'is-invalid' : '' }}" name="dimensions"
                                            value="{{ old('dimensions') }}" min="0.00" step="0.01" pattern="^\d+(?:\.\d{10,2})?$" autocomplete="dimensions">
                                        {{-- <x-input-error class="ml-2" :messages="$errors->get('dimensions')" /> --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="summernote">Описание</label>
                                    <textarea class="form-control" id="summernote" name="description" rows="9">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group d-none">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-info" type="radio" id="customRadio1" name="unit" value="шт" checked>
                                        <label for="customRadio1" class="custom-control-label">штука</label>
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
                                    <label class="text-black-50" for="selectCategoryPlumbing">Цвет</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectCategoryPlumbing" name="color_id">
                                        <option selected="selected" disabled>Выберете цвет</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" @selected(old('color_id') == $color->id)>{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectColorsPlumbing">Цвет</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectColorsPlumbing" name="color_id">
                                        <option selected="selected" disabled>Выберете цвет</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" @selected(old('color_id') == $color->id)>{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectBrandsPlumbing">Производитель</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectBrandsPlumbing" name="brand_id">
                                        <option selected="selected" disabled>Выберете производителя</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-black-50" for="selectCountryPlumbing">Страна</label>
                                    <select class="form-control select2" style="width: 100%;" id="selectCountryPlumbing" name="country_id">
                                        <option selected="selected" disabled>Выберете страну</option>
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
