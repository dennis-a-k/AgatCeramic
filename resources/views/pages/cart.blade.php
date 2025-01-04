@extends('layouts.main')

@section('title', ' | Корзина')

@section('content')
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Товар</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                        <th>Стоимость</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <x-cart.cart-table-tr>
                                        <x-slot name="img" src="assets/images/product-image/01.jpg"
                                            alt="Product"></x-slot>

                                        <x-slot name="url" href="#"></x-slot>

                                        <x-slot name="title">Керамогранит серый</x-slot>

                                        <x-slot name="price">100</x-slot>

                                        <x-slot name="quantity">1</x-slot>
                                    </x-cart.cart-table-tr>

                                    <x-cart.cart-table-tr>
                                        <x-slot name="img" src="assets/images/product-image/25.jpg"
                                            alt="Product"></x-slot>

                                        <x-slot name="url" href="#"></x-slot>

                                        <x-slot name="title">Керамогранит серый</x-slot>

                                        <x-slot name="price">100</x-slot>

                                        <x-slot name="quantity">1</x-slot>
                                    </x-cart.cart-table-tr>
                                    <x-cart.cart-table-tr>
                                        <x-slot name="img" src="assets/images/product-image/08.jpg"
                                            alt="Product"></x-slot>

                                        <x-slot name="url" href="#"></x-slot>

                                        <x-slot name="title">Керамогранит серый</x-slot>

                                        <x-slot name="price">100</x-slot>

                                        <x-slot name="quantity">1</x-slot>
                                    </x-cart.cart-table-tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Общая стоимость:</th>
                                        <th>60.00 &#8381;</th>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper justify-content-end">
                                    <div class="cart-clear">
                                        <a href="{{ route('checkout') }}">Оформить заказ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="empty-cart-area pb-100px pt-100px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="empty-text-contant text-center">
                        <i class="pe-7s-cart"></i>
                        <h3>Ваша корзина пуста</h3>
                        <a class="empty-cart-btn" href="shop-4-column.html">
                            <i class="fa fa-arrow-left"> </i> Перети к покупкам
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
