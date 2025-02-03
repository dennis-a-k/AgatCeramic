<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEdit" data-country="{{ $country }}" data-content="Редактировать">
    <i class="fas fa-pencil-alt"></i>
</button>

<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Редактирование страны
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('country.update') }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputCountry">Страна</label>
                            <input type="text" id="inputCountry" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} modal-title" name="name" value="" required autofocus
                                autocomplete="name">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('name')" /> --}}
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
