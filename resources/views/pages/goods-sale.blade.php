@extends('layouts.main')

@section('title')
    {{ $title }} купить в Москве по низкой цене с доставкой
@endsection

@section('content')
    <main class="shop-category-area pt-100px pb-100px">
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
                                                        src="{{ $product->images->first() ? asset('storage/images/' . $product->images->first()->title) : asset('assets/images/stock/stock-image.png') }}"
                                                        alt="{{ $product->title }}">
                                                    </x-slot>
                                                    <x-slot name="id">{{ $product->id }}</x-slot>
                                                    <x-slot name="category">{{ $product->category->title }}</x-slot>
                                                    <x-slot name="title">{{ $product->title }} @if (isset($product->attributes['weight_kg'])) {{ $product->attributes['weight_kg'] }} кг@endif</x-slot>
                                                    <x-slot name="price">{{ number_format($product->price, 2, '.', ' ') }}</x-slot>
                                                    <x-slot name="sale">{{ $product->sale }}</x-slot>
                                                    <x-slot name="urlProduct"
                                                        href="{{ route('product.show', [
                                                            'category' => $product->category->slug,
                                                            'slug' => $product->slug,
                                                            'sku' => $product->sku,
                                                        ]) }}">
                                                    </x-slot>
                                                    <x-slot name="urlCategory" href="{{ route('category.list', $product->category->slug) }}">
                                                    </x-slot>
                                                </x-goods.product-card>
                                            @empty
                                                <h1 class="text-center mt-2">Список товаров пуст</h1>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{ $goods->withQueryString()->links('components.pagination.pagination') }}
                    </div>
                </div>

                @include('components.sidebar.sidebar-sale')
            </div>
        </div>
    </main>
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

        .colors-filter {
            filter: brightness(95%);
        }

        /* Стили тултипа */
        .colors-filter::after {
            content: attr(data-color);
            position: absolute;
            top: -130%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #788da3;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            white-space: nowrap;
            display: none;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        /* Треугольник под тултипом */
        .colors-filter::before {
            content: "";
            position: absolute;
            top: -25%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: #788da3 transparent transparent transparent;
            display: none;
            transition: opacity 0.3s ease;
        }

        /* Показ тултипа и треугольника при наведении */
        .colors-filter:hover::after,
        .colors-filter:hover::before {
            display: block;
        }

        .color-list {
            position: relative;
            display: inline-block;
        }

        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }

        .disabled a {
            background-color: #e1e1e1;
        }

        .show-more-link {
            color: #788da3;
            text-decoration: underline;
            cursor: pointer;
            font-weight: 500;
        }

        .show-more-link:hover {
            color: #5a6d80;
            text-decoration: none;
        }
    </style>
@endsection

@section('js')
    <script>
        document.getElementById('show-all-brands')?.addEventListener('click', function(e) {
            e.preventDefault();
            const hiddenBrands = document.getElementById('hidden-brands');
            const showAllLink = document.getElementById('show-all-brands');

            if (hiddenBrands.style.display === 'none') {
                hiddenBrands.style.display = 'block';
                showAllLink.textContent = 'Скрыть';
            } else {
                hiddenBrands.style.display = 'none';
                showAllLink.textContent = 'Показать все';
            }
        });
    </script>
@endsection
