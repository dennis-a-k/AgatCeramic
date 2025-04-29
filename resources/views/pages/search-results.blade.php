@extends('layouts.main')

@section('title')
    {{ $title }} купить в Москве по низкой цене с доставкой
@endsection

@section('content')
    <main class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $title }}</h1>
                    <p>Найдено результатов: {{ $goods->total() }}</p>

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
                                                    <x-slot name="category">{{ $product->category->title }}</x-slot>
                                                    <x-slot name="id">{{ $product->id }}</x-slot>
                                                    <x-slot name="title">{{ $product->title }}</x-slot>
                                                    <x-slot name="price">{{ $product->price }}</x-slot>
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
                                                <div class="col-12">
                                                    <h5 class="text-center mt-2">По вашему запросу ничего не найдено</h5>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{ $goods->withQueryString()->links('components.pagination.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
