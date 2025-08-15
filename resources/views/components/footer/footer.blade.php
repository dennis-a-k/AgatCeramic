<footer class="footer-area">
    <div class="footer-container">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-md-30px mb-lm-30px">
                        <div class="single-wedge">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}" class="footer-logo-text">Agat Ceramic</a>
                            </div>
                            <p class="about-text lh-base" style="text-align: justify; color: #8a8a8a">
                                Интернет-магазин керамической плитки, керамогранита и мозаики в Москве и Московской области. В интернет-магазине Agat Ceramic вы найдете премиальную
                                керамическую плитку, керамогранит и мозаику от ведущих мировых производителей. Мы предлагаем эксклюзивные коллекции для создания уникального дизайна интерьера:
                                напольную и настенную плитку, износостойкий керамогранит для коммерческих и жилых помещений, а также стильную мозаику для акцентных решений.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Меню сайта</h4>
                            <div class="footer-links">
                                <div class="footer-row">
                                    <ul class="align-items-center">
                                        <li class="li">
                                            <a class="single-link"
                                                href="{{ $categories->contains('title', config('categories.keramogranit')) ? route('category.list', $categories->firstWhere('title', config('categories.keramogranit'))->slug) : 404 }}">
                                                {{ config('categories.keramogranit') }}
                                            </a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link"
                                                href="{{ $categories->contains('title', config('categories.plitka')) ? route('category.list', $categories->firstWhere('title', config('categories.plitka'))->slug) : 404 }}">
                                                {{ config('categories.plitka') }}
                                            </a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link"
                                                href="{{ $categories->contains('title', config('categories.mozaika')) ? route('category.list', $categories->firstWhere('title', config('categories.mozaika'))->slug) : 404 }}">
                                                {{ config('categories.mozaika') }}
                                            </a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="{{ route('partnerships') }}">
                                                Дизайнерам
                                            </a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="{{ route('delivery') }}">Доставка</a>
                                        </li>
                                        <li class="li">
                                            <a class="single-link" href="{{ route('return') }}">Возврат</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 col-sm-12">
                        <div class="single-wedge">
                            <h4 class="footer-herading">Контакты</h4>
                            <div class="footer-links">
                                <p class="mail">
                                    <a href="#" class="modal-call" data-link-action="modal-call" data-bs-toggle="modal" data-bs-target="#modalCall">
                                        Заказать звонок
                                    </a>
                                </p>
                                <p class="phone">
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:{{ $appData->app_phone ?? '---' }}" class="phone-link"> {{ $appData->appPhoneFormatted ?? '---' }}</a>
                                </p>
                                <p class="mail">
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:{{ $appData->app_email ?? '---' }}">{{ $appData->app_email ?? '---' }}</a>
                                </p>
                            </div>
                            <ul class="link-follow">
                                <li>
                                    <a class="m-0" target="_blank" rel="noopener noreferrer" href="https://t.me/{{ $appData->telegram ?? '---' }}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" rel="noopener noreferrer" href="https://wa.me/{{ $appData->whatsapp ?? '---' }}"><i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="line-shape-top line-height-1">
                    <div class="row flex-md-row-reverse align-items-center">
                        <div class="col-md-6 text-center text-md-end">
                            <div class="payment-mth">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center text-md-start">
                            <p class="copy-text"> ©
                                <?= date('Y') ?> <strong>Agat Ceramic</strong>
                                <a href="{{ route('policy') }}" class="company-name">Политика конфиденциальности</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
