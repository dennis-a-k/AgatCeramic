<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdropAdd" data-placement="top">
    Добавить
</button>

<div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="staticBackdropLabelAdd">
                    Добавление производителя
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputBrand">Название производителя</label>
                            <input type="text" id="inputBrand" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus
                                autocomplete="title">
                            {{--
                            <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                                Фото производителя
                            </button>
                            <div class="custom-file collapse mt-3" id="collapseBrand">
                                <input type="file" class="custom-file-input" id="brandImg" accept="image/png, image/jpeg, image/jpg, image/webp" name="img">
                                <label class="custom-file-label" for="brandImg" data-browse="Выбрать">
                                    Загрузите фото
                                </label>
                                {{--
                                <x-input-error class="ml-2" :messages="$errors->get('img')" /> --}}
                            </div>
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
