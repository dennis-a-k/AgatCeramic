@extends('layouts.main')

@section('title', 'Контакты | ')

@section('seo')
    <meta itemprop="contactType" content="customer service">
    <meta name="description" content="Контактная информация интернет-магазина {{ config('app.name') }}, {{ $appData->appPhoneFormatted ?? '---' }}">
    <meta property="og:title" content="Контакты компании | {{ config('app.name') }}">
    <meta property="og:description" content="Контактная информация интернет-магазина {{ config('app.name') }}, {{ $appData->appPhoneFormatted ?? '---' }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/stock/logo.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url" content="{{ route('contact') }}">
@endsection

@section('content')
    <main class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="contact-area">
                <div class="contact-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-title mb-30 text-center">
                                <h1 class="title">Контактная информация</h1>
                            </div>
                            <section class="contact-info" itemscope itemtype="http://schema.org/Organization">
                                <link itemprop="url" href="{{ route('home') }}" />
                                <div class="single-contact">
                                    <div class="icon-box" style="font-size: xxx-large;">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Телефон</h5>
                                        <p><a href="tel:{{ $appData->app_phone ?? '---' }}" itemprop="telephone">{{ $appData->appPhoneFormatted ?? '---' }}</a></p>
                                        <small>Москва (Пн.-Пт. 10:00-18:00)</small>
                                    </div>
                                </div>
                                <div class="single-contact">
                                    <div class="icon-box" style="font-size: xxx-large;">
                                        <i class="fa fa-telegram"></i> / <i class="fa fa-whatsapp"></i>
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Telegram/WhatsApp</h5>
                                        <p><a itemprop="sameAs" href="https://t.me/{{ $appData->telegram ?? '---' }}">{{ '@' . $appData->telegram ?? '---' }}</a></p>
                                        <p><a itemprop="sameAs" href="https://wa.me/{{ $appData->whatsapp ?? '---' }}">https://wa.me/{{ $appData->whatsapp ?? '---' }}</a></p>
                                    </div>
                                </div>
                                <div class="single-contact m-0">
                                    <div class="icon-box" style="font-size: xxx-large;">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Почта</h5>
                                        <p><a href="mailto:{{ $appData->app_email ?? '---' }}" itemprop="email">{{ $appData->app_email ?? '---' }}</a></p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
