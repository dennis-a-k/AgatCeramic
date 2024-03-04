@extends('layouts.main')

@section('title')
    | {{ $title }}
@endsection

@section('content')
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    @include('components.sorted.sorted')

                    <div class="shop-bottom-area">
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px">
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый cthdhfhfhfhfhhfhfhfhf fhfjjf
                                                    fffj</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>

                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>
                                            <x-goods.product-card>
                                                <x-slot name="img" src="assets/images/product-image/01.jpg"
                                                    alt="Product"></x-slot>

                                                <x-slot name="category">Керамогранит</x-slot>

                                                <x-slot name="title">Керамогранит серый</x-slot>

                                                <x-slot name="price">100</x-slot>

                                                <x-slot name="urlProduct" href="https://ya.ru"></x-slot>

                                                <x-slot name="urlCategory" href="https://mail.ru"></x-slot>
                                            </x-goods.product-card>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @include('components.pagination.pagination')
                    </div>
                </div>

                @include('components.sidebar.sidebar')
            </div>
        </div>
    </div>
@endsection
