@extends('layouts.main')

@section('title')
    | {{ $order_number }}
@endsection

@section('content')
    <main class="thank-you-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="inner_complated">
                        <div class="img_cmpted">
                            <img src="{{ asset('assets/images/stock/checkmark.png') }}" alt="check">
                        </div>
                        <p class="dsc_cmpted">
                            Спасибо за заказ в нашем магазине. Скоро вы получите письмо с подтверждением.
                        </p>
                        <div class="btn_cmpted">
                            <a href="{{ $categories->contains('title', 'Керамогранит') ? route('category.list', $categories->firstWhere('title', 'Керамогранит')->slug) : 404 }}"
                                class="shop-btn" title="Продолжить покупки">
                                Продолжить покупки
                            </a>
                        </div>
                    </div>
                    <div class="main_quickorder text-align-center">
                        <h3 class="title">Ваш номер заказа:</h3>
                        <div class="cntct typewriter-effect">
                            <span class="call_desk">
                                <p class="order">
                                    {{ $order_number }}
                                </p>
                            </span>
                        </div>
                        @if (session('success'))
                            <p>{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('css')
    <style>
        .img_cmpted {
            width: 15%;
            justify-self: center;
        }

        .order {
            font-size: 20px;
            color: #eb2606;
            margin: 15px 0 0;
            display: inline-block;
            font-weight: 500;
        }
    </style>
@endsection
