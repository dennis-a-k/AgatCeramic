<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#staticBackdropAdd" data-placement="top">
    Добавить
</button>
<a href="https://colorscheme.ru/html-colors.html" class="btn btn-secondary btn-sm text-white" target="_blank">
    Коды НЕХ для цветов
</a>

<div class="modal fade" id="staticBackdropAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="staticBackdropLabelAdd">
                    Добавление цвета
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('color.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputColor">Название цвета</label>
                            <input type="text" id="inputColor" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus
                                autocomplete="title">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
                        </div>

                        <div class="mt-2">
                            <label for="inputCode">
                                HEX код цвета <span class="text-secondary">(указать без #)</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">#</div>
                                </div>
                                <input type="text" id="inputCode" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ old('code') }}" required
                                    autocomplete="code">
                                {{-- <x-input-error class="ml-2" :messages="$errors->get('code')" /> --}}
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
