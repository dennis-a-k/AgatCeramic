@extends('layouts.admin')

@section('title', '| Загрузка изображений')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Массовая загрузка изображений товаров</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card card-success card-outline mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title text-success">Шаблон для загрузки</h3>
                        <p class="card-text">
                            <small class="form-text text-muted">
                                Используйте этот шаблон для заполнения данных о изображениях товаров.<br>
                                Столбцы: Артикул, Номер картинки, Ссылка (ссылка на изображение или локальный путь).
                            </small>
                        </p>
                    </div>
                    <a href="{{ route('images.template.export') }}" class="btn btn-default">
                        <i class="fas fa-download"></i> Скачать шаблон
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('images.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fileExcel">Excel файл с изображениями</label>
                        <input type="file" class="form-control-file" id="fileExcel" name="fileExcel" required>
                        <small class="form-text text-muted">
                            Формат файла: столбцы Артикул, Номер картинки, Ссылка (ссылка на изображение или локальный путь).<br>
                            Локальные пути могут быть абсолютными (например, <code>C:\images\image.jpg</code>) или относительными относительно корня проекта (например, <code>public/temp/image.jpg</code>)
                        </small>
                    </div>
                    <button type="submit" class="btn btn-info">Загрузить изображения</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.zip.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="zipFile">ZIP архив с изображениями</label>
                        <input type="file" class="form-control-file" id="zipFile" name="zipFile" required>
                        <div class="mt-3 mb-3 p-3 border rounded bg-light">
                            <h5 class="text-success">Формат именования файлов:</h5>
                            <div class="d-flex align-items-center mb-2">
                                <div class="mr-3 font-weight-bold">Пример:</div>
                                <div class="text-monospace bg-white p-2 rounded">
                                    ART-123_0.jpg
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div class="mr-3 font-weight-bold">Где:</div>
                                <div>
                                    <ul class="list-unstyled">
                                        <li><code>ART-123</code> - артикул товара</li>
                                        <li><code>_</code> - разделитель (обязателен)</li>
                                        <li><code>0</code> - порядковый номер изображения (начинается с 0)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="alert alert-warning p-2">
                                <i class="fas fa-info-circle mr-2"></i>
                                Допустимые расширения: .jpg, .jpeg, .png, .webp
                            </div>
                        </div>
                        <small class="form-text text-muted">
                            Файлы в архиве должны быть названы в формате: <code>артикул_номер.расширение</code> (например: ART-001_0.jpg)
                        </small>
                    </div>
                    <button type="submit" class="btn btn-info">Загрузить изображения</button>
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
