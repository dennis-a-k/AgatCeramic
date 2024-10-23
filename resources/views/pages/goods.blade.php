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
                                        @if (!isset($goods[0]))
                                        <h5 class="text-center mt-2">Список товаров пуст</h5>
                                        @else
                                        @foreach ($goods as $key => $product)
                                        <x-goods.product-card>
                                            <x-slot name="img"
                                                src="{{ $product->images->first() ? asset('storage/images/' . $product->images->first()->title) : asset('assets/images/stock/stock-image.png') }}"
                                                alt="{{ $product->title }}">
                                            </x-slot>

                                            <x-slot name="category">{{ $title }}</x-slot>

                                            <x-slot name="title">{{ $product->title }}</x-slot>

                                            <x-slot name="price">{{ $product->price }}</x-slot>

                                            <x-slot name="urlProduct" href="{{ route('keramogranit.show') }}"></x-slot>

                                            <x-slot name="urlCategory" href="{{ route($url . '.list') }}"></x-slot>
                                        </x-goods.product-card>
                                        @endforeach
                                        @endif
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
