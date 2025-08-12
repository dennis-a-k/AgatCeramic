@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Массовая загрузка изображений товаров</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.zip.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="zipFile">ZIP архив с изображениями</label>
                        <input type="file" class="form-control-file" id="zipFile" name="zipFile" required>
                        <small class="form-text text-muted">
                            Файлы в архиве должны быть названы в формате: артикул_номер.jpg (например: ART-001_0.jpg)
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary">Загрузить изображения</button>
                </form>
            </div>
        </div>

        @if (session('status') === 'images-imported')
            <div class="alert alert-success mt-3">
                Изображения успешно загружены!
            </div>
        @endif
    </div>
@endsection
