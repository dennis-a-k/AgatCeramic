<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Фото товара
                <i class="far fa-question-circle text-info images"></i>
            </h3>
        </div>

        <div class="card-body">
            @for ($i = 5 - $currentImageCount; $i > 0; $i--)
                <label for="images">Добавить картинку:</label>
                <input type="file" name="imgs[]" id="images" multiple
                    accept="image/png, image/jpeg, image/jpg, image/webp"><br><br>
            @endfor

            @foreach ($product->images as $index => $image)
                <div>
                    <img src="{{ asset('storage/images/' . $image->title) }}" alt="Product Image" style="width: 100px;">
                    <select name="image_order[{{ $image->id }}]">
                        @for ($i = 0; $i < 5; $i++)
                            <option value="{{ $i }}" {{ $image->order == $i ? 'selected' : '' }}>
                                {{ $i + 1 }}
                            </option>
                        @endfor
                    </select>

                    <button type="button" class="btn btn-danger btn-sm delete-image"
                        data-image-id="{{ $image->id }}">
                        Удалить картинку
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</section>
