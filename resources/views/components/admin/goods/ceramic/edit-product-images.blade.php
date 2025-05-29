<section class="col-md-6">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">
                Фото товара
                <i class="far fa-question-circle text-info images"></i>
            </h3>
        </div>

        <div class="card-body bg-light">
            @for ($i = 5 - $currentImageCount; $i > 0; $i--)
                <div class="row align-items-center">
                    <div class="col form-group">
                        <label class="text-black-50" for="customFile">Добавить картинку</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]" multiple>
                            <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                                Загрузите картинку
                            </label>
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <div class="card-footer">
            <div class="row justify-content-center">
                @if (!isset($product->images[0]))
                    <div class="w-100">
                        <h5 class="text-info text-center">Изображений товара нет</h5>
                    </div>
                @else
                    <div class="w-100">
                        <p class="text-secondary text-center mb-3">Выберите порядок изображений</p>
                    </div>
                    @foreach ($product->images as $index => $image)
                        <div class="col-auto mb-3 mx-3">
                            <div class="row">
                                <div class="rounded" style="aspect-ratio: 1 / 1; overflow: hidden; width: 100px; align-content: center; border: 1px solid #e5e5e5;">
                                    <img src="{{ asset('storage/images/' . $image->title) }}" class="rounded" style="width: 100%;" alt="{{ $image->title }}">
                                </div>

                                <div class="ml-2">
                                    <button type="button" class="btn btn-danger btn-sm delete-image mb-1 w-100" data-image-id="{{ $image->id }}" data-content="Удалить">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <div class="">
                                        <select class="form-control" name="image_order[{{ $image->id }}]">
                                            @for ($i = 0; $i < 5; $i++)
                                                <option value="{{ $i }}" {{ $image->order == $i ? 'selected' : '' }}>
                                                    {{ $i + 1 }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
