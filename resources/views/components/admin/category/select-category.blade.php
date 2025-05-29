<section class="col-md-6">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Дополнительные характеристики</h3>
        </div>

        <div class="card-body bg-light">
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="form-group">
                    <label class="text-black-50" for="selectCategoriesChildren">Категория</label>
                    <select class="form-control select2" style="width: 100%;" id="selectCategoriesChildren" name="parent_id" required>
                        <option selected="selected" disabled value="">Выберете категорию</option>
                        @foreach ($categories->children as $category)
                            <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div>
                        <label class="text-black-50" for="inputTitle">Подкатегория</label>
                        <input type="text" id="inputTitle" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}" required
                            autocomplete="title">
                        <x-error.input-error class="ml-2" :messages="$errors->get('title')" />
                    </div>
                </div>
                <button type="submit" class="btn btn-info float-right">
                    Добавить
                </button>
            </form>
        </div>
    </div>
</section>
