@extends('layouts.main')

@section('title', 'Оплата и доставка | ')

@section('content')
    <main class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <a href="{{ route('orders.list') }}" class="btn-dark">Админка</a>
        </div>
    </main>
@endsection
