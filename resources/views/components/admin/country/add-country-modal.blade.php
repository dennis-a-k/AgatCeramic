<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdropAdd" data-placement="top">
    Добавить
</button>

<div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="staticBackdropLabelAdd">
                    Добавление страны
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('country.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputCountry">Страна</label>
                            <input type="text" id="inputCountry" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus
                                autocomplete="name">
                            <x-error.input-error class="ml-2" :messages="$errors->get('name')" />
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
