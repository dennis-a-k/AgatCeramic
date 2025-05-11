<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdropAdd" data-placement="top">
    Добавить
</button>

<div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="staticBackdropLabelAdd">
                    Добавление категории
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputCollection">Название категории в множественном числе</label>
                            <input type="text" id="inputCollection" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required
                                autofocus autocomplete="title">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="inputCategorySubtitle">Название категории в единственном числе</label>
                            <input type="text" id="inputCategorySubtitle" class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" name="subtitle" value="{{ old('subtitle') }}"
                                required autofocus autocomplete="subtitle">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('subtitle')" /> --}}
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-info btn-sm col-6" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                            Фото категории
                        </button>
                        <p class="text-secondary text-center" style="line-height: normal; margin-top: 1rem;">
                            Необходимо загрузить фото размером 1280х540px для фоновой картинки кнопки страницы с сантехникой
                        </p>

                        <div class="custom-file collapse mt-3" id="collapseBrand">
                            <input type="file" class="custom-file-input" id="brandImg" accept="image/png, image/jpeg, image/jpg, image/webp" name="img">
                            <label class="custom-file-label" for="brandImg" data-browse="Выбрать">
                                Загрузите фото
                            </label>
                            {{--
                                <x-input-error class="ml-2" :messages="$errors->get('img')" /> --}}
                        </div>
                    </div>

                    <div class="form-group d-none">
                        <div>
                            <label for="inputParent_id">Родительский id</label>
                            <input type="text" id="inputParent_id" class="form-control" name="parent_id" value="{{ $santexnika->id }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-info">
                        Добавить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
