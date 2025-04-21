<div class="header-top">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <div class="welcome-text">
                    <p>Москва (Пн.-Пт. 10:00-18:00)</p>
                </div>
            </div>

            <div class="col d-none d-lg-block">
                <div class="top-nav">
                    <ul>
                        <li><a href="{{ route('delivery') }}">Оплата и доставка</a></li>
                        <li><a href="{{ route('return') }}">Возврат и замена</a></li>
                        <li>
                            <a href="#" class="modal-call" data-link-action="modal-call" data-bs-toggle="modal" data-bs-target="#modalCall">
                                Заказать звонок
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-auto d-none d-lg-block">
                <div class="top-nav">
                    <ul>
                        <li><a href="tel:{{ $appData->app_phone ?? '---' }}" class="phone-link"><i class="fa fa-phone"></i> {{ $appData->appPhoneFormatted ?? '---' }}</a></li>
                        <li>
                            <a href="mailto:{{ $appData->app_email ?? '---' }}">
                                <i class="fa fa-envelope-o"></i>
                                {{ $appData->app_email ?? '---' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
