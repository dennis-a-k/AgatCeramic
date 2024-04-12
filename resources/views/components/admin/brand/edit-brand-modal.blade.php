<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEdit" data-brand="{{ $brand }}"
    data-content="Редактировать">
    <i class="fas fa-pencil-alt"></i>
</button>

<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Редактирование производителя
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('brand.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputBrand">Название производителя</label>
                            <input type="text" id="inputBrand"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} modal-title"
                                name="title" value="" required autofocus autocomplete="title">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse"
                                data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                                Фото производителя
                            </button>
                            <div class="custom-file collapse mt-3" id="collapseBrand">
                                <input type="file" class="custom-file-input" id="brandImg"
                                    accept="image/png, image/jpeg, image/jpg, image/webp" name="img">
                                <label class="custom-file-label" for="brandImg" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('img')" /> --}}
                            </div>
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
