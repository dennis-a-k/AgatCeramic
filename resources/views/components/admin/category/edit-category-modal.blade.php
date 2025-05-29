<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEdit" data-category="{{ $category }}" data-content="Редактировать">
    <i class="fas fa-pencil-alt"></i>
</button>

<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Редактирование категории
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputСategory">Название категории в множественном числе</label>
                            <input type="text" id="inputСategory" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} modal-title" name="title" value="" required autofocus
                                autocomplete="title">
                            <x-error.input-error class="ml-2" :messages="$errors->get('title')" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="inputCategorySubtitle">Название категории в единственном числе</label>
                            <input type="text" id="inputCategorySubtitle" class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }} modal-subtitle" name="subtitle" value=""
                                required autofocus autocomplete="subtitle">
                            <x-error.input-error class="ml-2" :messages="$errors->get('subtitle')" />
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
                            <x-error.input-error class="ml-2" :messages="$errors->get('img')" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-info modal-id" name="id" value="">
                        Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
