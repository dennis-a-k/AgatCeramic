<div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabelAdd">
                    Удаление поверхности
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('texture.destroy') }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5 class="modal-text text-center">Удалить?</h5>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-danger modal-id" name="id" value="">
                        Удалить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
