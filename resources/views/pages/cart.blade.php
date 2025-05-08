@extends('layouts.main')

@section('title', 'Корзина | ')

@section('content')
    @if (count($cart) > 0)
        <main class="cart-main-area pt-100px pb-100px">
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
                                            <th> </th>
                                            <th>Стоимость</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $id => $product)
                                            <x-cart.cart-table-tr :id="$id" :img="$product['image']->first() ? asset('storage/images/' . $product['image']->first()->title) : asset('assets/images/stock/stock-image.png')" :url="route('product.show', [
                                                'category' => $product['category_slug'] ?? '',
                                                'slug' => $product['slug'] ?? '',
                                                'sku' => $product['sku'],
                                            ])" :title="$product['title']" :price="$product['price']" :quantity="$product['quantity']" :unit="$product['unit']"
                                                :weight_kg="$product['weight_kg'] ?? null" :category="$product['category']" />
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th colspan="2">Общая стоимость:</th>
                                            <th class="cart-total">{{ number_format($total, 2, '.', ' ') }} &#8381;</th>
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
        </main>
    @else
        <main class="empty-cart-area pb-100px pt-100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="empty-text-contant text-center">
                            <i class="pe-7s-cart"></i>
                            <h3>Ваша корзина пуста</h3>
                            <a class="empty-cart-btn"
                                href="{{ $categories->contains('title', config('categories.keramogranit')) ? route('category.list', $categories->firstWhere('title', config('categories.keramogranit'))->slug) : 404 }}">
                                <i class="fa fa-arrow-left"> </i> Перети к покупкам
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
@endsection
