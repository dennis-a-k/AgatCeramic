<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Фото товара
                <i class="far fa-question-circle text-info images"></i>
            </h3>
        </div>

        <div class="card-body">
            @switch(count($product->images))
                @case(5)
                    @foreach ($product->images as $key => $image)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ URL::asset('storage/' . $image->title) }}" class="rounded" width="65px"
                                    alt="{{ $image->title }}">
                            </div>
                            <div class="col form-group">
                                <label class="text-black-50" for="customFile">Фото №{{ $key + 1 }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите фото
                                    </label>
                                    {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @break

                @case(4)
                    @foreach ($product->images as $key => $image)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ URL::asset('storage/' . $image->title) }}" class="rounded" width="65px"
                                    alt="{{ $image->title }}">
                            </div>
                            <div class="col form-group">
                                <label class="text-black-50" for="customFile">Фото №{{ $key + 1 }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите фото
                                    </label>
                                    {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded" width="65px"
                                alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>
                @break

                @case(3)
                    @foreach ($product->images as $key => $image)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ URL::asset('storage/' . $image->title) }}" class="rounded" width="65px"
                                    alt="{{ $image->title }}">
                            </div>
                            <div class="col form-group">
                                <label class="text-black-50" for="customFile">Фото №{{ $key + 1 }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите фото
                                    </label>
                                    {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded" width="65px"
                                alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded" width="65px"
                                alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>
                @break

                @case(2)
                    @foreach ($product->images as $key => $image)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ URL::asset('storage/' . $image->title) }}" class="rounded" width="65px"
                                    alt="{{ $image->title }}">
                            </div>
                            <div class="col form-group">
                                <label class="text-black-50" for="customFile">Фото №{{ $key + 1 }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите фото
                                    </label>
                                    {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>
                @break

                @case(1)
                    @foreach ($product->images as $key => $image)
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ URL::asset('storage/' . $image->title) }}" class="rounded" width="65px"
                                    alt="{{ $image->title }}">
                            </div>
                            <div class="col form-group">
                                <label class="text-black-50" for="customFile">Фото №{{ $key + 1 }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile"
                                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                        Загрузите фото
                                    </label>
                                    {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №2</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>
                @break

                @default
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №1</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №2</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №4</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ URL::asset('assets/images/admin/stock-image.jpeg') }}" class="rounded"
                                width="65px" alt="stock-image">
                        </div>
                        <div class="col form-group">
                            <label class="text-black-50" for="customFile">Фото №5</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                            </div>
                        </div>
                    </div>
            @endswitch
        </div>
    </div>
</section>
