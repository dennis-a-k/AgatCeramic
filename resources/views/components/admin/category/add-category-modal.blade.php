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
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div>
                            <label for="inputCollection">Категория</label>
                            <input type="text" id="inputCollection" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required
                                autofocus autocomplete="title">
                            {{-- <x-input-error class="ml-2" :messages="$errors->get('title')" /> --}}
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
