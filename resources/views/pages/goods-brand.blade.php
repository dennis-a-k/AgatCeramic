@extends('layouts.main')

@section('title')
    | {{ $title }}
@endsection

@section('content')
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <div>
                        <p>{{ $title }}</p>
                        @if ($brand->img)
                            <img src="{{ asset('storage/brands/' . $brand->img) }}" alt="{{ $brand->title }}"
                                style="max-height: 45px;">
                        @endif
                    </div>

                    @include('components.sorted.sorted')

                    <div class="shop-bottom-area">
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px">
                                            @forelse ($goods as $product)
                                                <x-goods.product-card>
                                                    <x-slot name="img"
                                                        src="{{ $product->images->first()
                                                            ? asset('storage/images/' . $product->images->first()->title)
                                                            : asset('assets/images/stock/stock-image.png') }}"
                                                        alt="{{ $product->title }}">
                                                    </x-slot>
                                                    <x-slot name="category">{{ $product->category->title }}</x-slot>
                                                    <x-slot name="title">{{ $product->title }}</x-slot>
                                                    <x-slot name="price">{{ $product->price }}</x-slot>
                                                    <x-slot name="urlProduct"
                                                        href="{{ route('product.show', $product->sku) }}">
                                                    </x-slot>
                                                    <x-slot name="urlCategory"
                                                        href="{{ route('category.list', $product->category->slug) }}"></x-slot>
                                                </x-goods.product-card>
                                            @empty
                                                <h5 class="text-center mt-2">Список товаров пуст</h5>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('components.pagination.pagination')
                    </div>
                </div>

                @include('components.sidebar.sidebar-brand')
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .btn-filter {
            display: block;
            text-transform: none;
            font-weight: 500;
            font-size: 16px;
            color: #8a8a8a;
            box-shadow: none;
            padding: 10px 15px;
            line-height: 26px;
            border: 1px solid #e1e1e1;
            background: #fff;
            border-radius: 0;
            width: auto;
            height: auto;
            text-align: center;
            margin: 35px 0 0 0;
        }

        .btn-filter:hover {
            background-color: #788da3;
            border: 1px solid #788da3;
            color: #fff;
        }

        /* Стили для ссылки */
        .colors-filter {
            position: relative;
            filter: brightness(95%);
        }

        /* Стили тултипа */
        .colors-filter::after {
            content: attr(data-color);
            /* Используем текст из атрибута data-color */
            position: absolute;
            top: 120%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #788da3;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            z-index: 10;
            pointer-events: none;
        }

        /* Треугольник под тултипом */
        .colors-filter::before {
            content: "";
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent #788da3 transparent;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        /* Показ тултипа и треугольника при наведении */
        .colors-filter:hover::after,
        .colors-filter:hover::before {
            opacity: 1;
            visibility: visible;
        }
    </style>
@endsection