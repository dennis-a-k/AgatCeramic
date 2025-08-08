<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }} | Сотрудничество для дизайнеров</title>
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/partnerships1.css') }}">
    </head>

    <body>
        <div class="scroll-nav">
            <div class="nav-dot active" data-title="Главная" data-section="hero"></div>
            <div class="nav-dot" data-title="Высокие комиссии" data-section="commission"></div>
            <div class="nav-dot" data-title="Эксклюзивные материалы" data-section="exclusive"></div>
            <div class="nav-dot" data-title="Персональный менеджер" data-section="manager"></div>
            <div class="nav-dot" data-title="Готовый контент" data-section="content"></div>
            <div class="nav-dot" data-title="Присоединиться" data-section="contact"></div>
        </div>

        <header id="mainHeader">
            <div class="header-container">
                <a href="{{ route('home') }}">
                    <div class="row align-items-center logo">
                        <img src="{{ asset('assets/images/stock/logo.svg') }}" class="col-3 pe-0" alt="logo" style="filter: invert(1) brightness(2)">
                        <h3 class="col-9 m-0">Agat <span>Ceramic</span></h3>
                    </div>
                </a>
                <a href="#contact" class="btn visible">Присоединиться</a>
            </div>
        </header>

        <section class="fullscreen-section" id="hero">
            <img src="{{ asset('assets/images/partnerships/main.png') }}" alt="Дизайн интерьера" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <h1>Превратите ваши проекты в источник дохода</h1>
                <p>Присоединяйтесь к сообществу дизайнеров <strong>{{ config('app.name') }}</strong> и получайте до 15% с каждого заказа ваших клиентов</p>
                <a href="#contact" class="btn">Начать сотрудничество</a>
                <a href="#commission" class="btn btn-outline">Узнать подробности</a>
            </div>
        </section>

        <section class="fullscreen-section" id="commission">
            <img src="{{ asset('assets/images/partnerships/section-2.png') }}" alt="Высокие комиссионные" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-percentage floating"></i>
                    </div>
                    <h2>Высокие комиссионные</h2>
                    <p>Получайте до 15% от суммы заказа вашего клиента. Чем больше вы продаете, тем выше ваш процент.</p>
                    <p>Наши топ-партнеры зарабатывают дополнительно от 150 000 ₽ в месяц.</p>
                    <a href="#contact" class="btn">Хочу такие условия</a>
                </div>
            </div>
        </section>

        <section class="fullscreen-section" id="exclusive">
            <img src="{{ asset('assets/images/partnerships/section-3.png') }}" alt="Эксклюзивные материалы" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-gem floating"></i>
                    </div>
                    <h2>Эксклюзивные коллекции</h2>
                    <p>Доступ к ограниченным сериям и новинкам раньше других. Уникальные материалы для ваших проектов.</p>
                    <p>Только через наших партнеров-дизайнеров клиенты могут получить эти премиальные материалы.</p>
                    <a href="#contact" class="btn">Получить доступ</a>
                </div>
            </div>
        </section>

        <section class="fullscreen-section" id="manager">
            <img src="{{ asset('assets/images/partnerships/section-4.png') }}" alt="Персональный менеджер" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-user-tie floating"></i>
                    </div>
                    <h2>Персональный менеджер</h2>
                    <p>Выделенный специалист, который поможет с подбором материалов, оформлением заказов и решением любых
                        вопросов.</p>
                    <p>Ваш менеджер знает все о ваших клиентах и предпочтениях.</p>
                    <a href="#contact" class="btn">Хочу менеджера</a>
                </div>
            </div>
        </section>

        <section class="fullscreen-section" id="content">
            <img src="{{ asset('assets/images/partnerships/section-5.png') }}" alt="Готовый контент" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-photo-video floating"></i>
                    </div>
                    <h2>Готовый профессиональный контент</h2>
                    <p>HD фото, 3D-визуализации и технические спецификации всех коллекций для ваших презентаций.</p>
                    <p>Экономьте время на создание материалов для клиентов.</p>
                    <a href="#contact" class="btn">Получить материалы</a>
                </div>
            </div>
        </section>

        <section class="fullscreen-section" id="contact">
            <img src="{{ asset('assets/images/partnerships/section-6.png') }}" alt="Присоединиться" class="section-bg">
            <div class="section-overlay"></div>
            <div class="section-content">
                <form class="contact-form" id="partnerForm" method="POST" action="{{ route('call.partnerships') }}">
                    @csrf

                    <h2 style="text-align: center">Стать партнером <span style="color: #b8860b">{{ config('app.name') }}</span></h2>
                    <p style="text-align: center">Заполните форму, и наш менеджер свяжется с вами для обсуждения условий сотрудничества</p>

                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>

                    <button type="submit" class="btn">Отправить заявку</button>
                </form>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; <?= date('Y') ?> {{ config('app.name') }}. Все права защищены.</p>
                <p>Сотрудничество с лучшими дизайнерами интерьеров</p>
            </div>
        </footer>

        <div id="successModal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h3>Спасибо за вашу заявку!</h3>
                <p>Наш менеджер свяжется с вами в ближайшее время.</p>
            </div>
        </div>

        <script src="{{ asset('assets/js/partnerships1.js') }}"></script>
    </body>

</html>
