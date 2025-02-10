@extends('layouts.main')

@section('title', 'Оформление заказа | ')

@section('content')
    <main class="checkout-area pt-100px pb-100px">
        <div class="container">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    @include('components.cart.checkout-detail')

                    @include('components.cart.checkout-order')
                </div>
            </form>
        </div>
    </main>
@endsection
