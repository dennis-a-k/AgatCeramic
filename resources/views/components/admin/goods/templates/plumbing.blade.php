<div class="col-xl-3 mb-4">
    <p class="text-info w-100">Сантехника</p>
    <form method="POST" action="{{ route('goods.import') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" accept=".xls, .xlsx " name="fileExcel" required>
                <label class="custom-file-label" for="customFile" data-browse="Выбрать">
                    Загрузите шаблон Excel
                </label>
                {{-- <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" /> --}}
            </div>
        </div>

        <a href="{{ route('ceramic.template.export') }}" class="btn btn-default" download>
            <i class="fas fa-download"></i> Скачать Excel шаблон
        </a>

        @if (session('status') === 'template-loaded')
            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-info text-align-center mr-2">Шаблон загружен</span>
        @endif

        <button type="submit" class="btn btn-info float-right">Загрузить</button>
    </form>
</div>
