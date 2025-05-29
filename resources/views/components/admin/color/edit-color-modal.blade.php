<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalEdit" data-color="{{ $color }}" data-content="Редактировать">
    <i class="fas fa-pencil-alt"></i>
</button>

<div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Редактирование цвета
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('color.update') }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputColor">Название цвета</label>
                            <input type="text" id="inputColor" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} modal-title" name="title" value="" required autofocus
                                autocomplete="title">
                            <x-error.input-error class="ml-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mt-2">
                            <label for="inputCode">
                                HEX код цвета <span class="text-secondary">(указать без #)</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input type="text" id="inputCode" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }} modal-code" name="code" value="" required
                                    autocomplete="code">
                                <x-error.input-error class="ml-2" :messages="$errors->get('code')" />
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
