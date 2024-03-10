@extends('layouts.main')

@section('title', ' | Оплата и доставка')

@section('content')
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <form action="/goods-import" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="files">
                <button class="btn-dark" type="submit">Send</button>
            </form>
        </div>
    </div>
@endsection
