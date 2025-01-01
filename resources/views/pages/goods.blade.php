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
                                            @forelse ($goods as $product)
                                                <x-goods.product-card>
                                                    <x-slot name="img"
                                                        src="{{ $product->images->first()
                                                            ? asset('storage/images/' . $product->images->first()->title)
                                                            : asset('assets/images/stock/stock-image.png') }}"
                                                        alt="{{ $product->title }}">
                                                    </x-slot>
                                                    <x-slot name="category">{{ $product->category->title }}</x-slot>
                                                    <x-slot name="id">{{ $product->id }}</x-slot>
                                                    <x-slot name="title">{{ $product->title }}</x-slot>
                                                    <x-slot name="price">{{ $product->price }}</x-slot>
                                                    <x-slot name="urlProduct"
                                                        href="{{ route('product.show', $product->sku) }}">
                                                    </x-slot>
                                                    <x-slot name="urlCategory"
                                                        href="{{ route('category.list', $product->category->slug) }}">
                                                    </x-slot>
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

                @include('components.sidebar.sidebar')
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

        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .disabled a {
            background-color: #e1e1e1;
        }
    </style>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".quickview");

            buttons.forEach(button => {
                button.addEventListener("click", function() {
                    const productId = this.getAttribute("data-id");

                    // Очищаем модальное окно перед загрузкой новых данных
                    document.querySelector("#modalProduct .modal-body h2").innerText =
                        "Загрузка...";
                    document.querySelector("#modalProduct .modal-body .new-price").innerText = "";
                    document.querySelector(
                            "#modalProduct .modal-body .swiper-container .swiper-wrapper")
                        .innerHTML = "";

                    // Выполняем AJAX-запрос
                    fetch(`/api/product/${productId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error("Ошибка загрузки данных");
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Заменяем null на дефолтные значения
                            const title = data.title || "---";
                            const price = data.price || "---";
                            const sku = data.sku || "---";
                            const unit = data.unit === "шт" ? "<span>шт.</span>" :
                                "<span>м<sup>2</sup></span>";
                            const collection = data.collection ? data.collection.title : "---";
                            const brand = data.brand ? data.brand.title : "---";
                            const description = data.description || "---";
                            const images = data.images && data.images.length > 0 ? data.images :
                                [{
                                    title: null
                                }];

                            //Обновляем содержимое модального окна
                            document.querySelector("#modalProduct .modal-body h2")
                                .innerText = title;
                            document.querySelector("#modalProduct .modal-body .new-price")
                                .innerText = `${price} ₽`;
                            document.querySelector("#modalProduct .modal-body .new-sku")
                                .innerText = sku;
                            document.querySelector("#modalProduct .modal-body .new-unit")
                                .innerHTML = unit;
                            document.querySelector("#modalProduct .modal-body .new-collection")
                                .innerText = collection;
                            document.querySelector("#modalProduct .modal-body .new-brand")
                                .innerText = brand;
                            document.querySelector("#modalProduct .modal-body .new-description")
                                .innerText = description;
                            document.querySelector(
                                "#modalProduct .modal-body .swiper-container .swiper-wrapper"
                            ).innerHTML = images.map(image => `
                                            <div class="swiper-slide" style="border: none;">
                                                <img class="img-responsive m-auto"
                                                    src="${image.title ? `{{ asset('/storage/images/${image.title}') }}` : `{{ asset('assets/images/stock/stock-image.png') }}`}"
                                                    alt="${image.title ? image.title : 'Изображение по умолчанию'}">
                                            </div>
                                        `).join("");
                            // document.querySelectorAll(
                            //     "#modalProduct .modal-body .swiper-container .swiper-wrapper"
                            // ).forEach(wrapper => {
                            //     wrapper.innerHTML = images.map(image =>
                            //         `<div class="swiper-slide"><img class="img-responsive m-auto" src="{{ asset('storage/images/${image.title}') }}" alt="${image.title}"></div>`
                            //     ).join("");
                            // });
                        })
                        .catch(error => {
                            console.error(error);
                            document.querySelector("#modalProduct .modal-body h2").innerText =
                                "Ошибка загрузки данных";
                        });
                });
            });
        });
    </script>
@endsection
