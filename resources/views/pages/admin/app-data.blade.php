@extends('layouts.admin')

@section('title', '| Данные сайта')

@section('css')
    <style type="text/css">
        .error-login {
            font-size: 80%;
            color: #dc3545;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-info">Данные сайта</h1>
                </div>
            </div>
        </div>
    </div>

    @include('components.admin.app-data.status')
@endsection

@section('content')
    <div class="row">
        @include('components.admin.app-data.table')

        @include('components.admin.app-data.forms')
    </div>
@endsection
