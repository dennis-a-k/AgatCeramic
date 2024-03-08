@extends('layouts.main')

@section('title', ' | Оформление заказа')

@section('content')
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                @include('components.cart.checkout-detail')

                @include('components.cart.checkout-order')
            </div>
        </div>
    </div>
@endsection
