<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Designers Collaboration | Премиальная плитка и керамогранит</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            /* CSS стили будут здесь */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Montserrat', sans-serif;
                color: #333;
                line-height: 1.6;
                overflow-x: hidden;
            }

            .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }

            /* Header */
            header {
                background-color: #fff;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                position: fixed;
                width: 100%;
                z-index: 1000;
            }

            .header-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 0;
            }

            .logo {
                font-family: 'Playfair Display', serif;
                font-size: 24px;
                font-weight: 700;
                color: #2a2a2a;
                text-decoration: none;
            }

            .logo span {
                color: #b8860b;
            }

            nav ul {
                display: flex;
                list-style: none;
            }

            nav ul li {
                margin-left: 30px;
            }

            nav ul li a {
                text-decoration: none;
                color: #2a2a2a;
                font-weight: 500;
                transition: color 0.3s;
            }

            nav ul li a:hover {
                color: #b8860b;
            }

            .mobile-menu-btn {
                display: none;
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: #2a2a2a;
            }

            /* Hero Section */
            .hero {
                background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
                background-size: cover;
                background-position: center;
                height: 100vh;
                display: flex;
                align-items: center;
                color: #fff;
                padding-top: 80px;
            }

            .hero-content {
                max-width: 600px;
            }

            .hero h1 {
                font-family: 'Playfair Display', serif;
                font-size: 48px;
                margin-bottom: 20px;
                line-height: 1.2;
            }

            .hero p {
                font-size: 18px;
                margin-bottom: 30px;
            }

            .btn {
                display: inline-block;
                background-color: #b8860b;
                color: #fff;
                padding: 12px 30px;
                border-radius: 4px;
                text-decoration: none;
                font-weight: 600;
                transition: background-color 0.3s;
                border: none;
                cursor: pointer;
                font-size: 16px;
            }

            .btn:hover {
                background-color: #a67c10;
            }

            .btn-outline {
                background-color: transparent;
                border: 2px solid #b8860b;
                margin-left: 15px;
            }

            .btn-outline:hover {
                background-color: rgba(184, 134, 11, 0.1);
            }

            /* Benefits Section */
            .section {
                padding: 100px 0;
            }

            .section-title {
                text-align: center;
                margin-bottom: 60px;
            }

            .section-title h2 {
                font-family: 'Playfair Display', serif;
                font-size: 36px;
                color: #2a2a2a;
                margin-bottom: 15px;
            }

            .section-title p {
                color: #666;
                max-width: 700px;
                margin: 0 auto;
            }

            .benefits-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            }

            .benefit-card {
                background-color: #fff;
                border-radius: 8px;
                padding: 30px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s, box-shadow 0.3s;
                text-align: center;
            }

            .benefit-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }

            .benefit-icon {
                font-size: 40px;
                color: #b8860b;
                margin-bottom: 20px;
            }

            .benefit-card h3 {
                font-size: 22px;
                margin-bottom: 15px;
                color: #2a2a2a;
            }

            /* Portfolio Section */
            .portfolio {
                background-color: #f9f9f9;
            }

            .portfolio-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 25px;
            }

            .portfolio-item {
                position: relative;
                overflow: hidden;
                border-radius: 8px;
                height: 250px;
            }

            .portfolio-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s;
            }

            .portfolio-item:hover img {
                transform: scale(1.1);
            }

            .portfolio-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(42, 42, 42, 0.8);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                opacity: 0;
                transition: opacity 0.3s;
                color: #fff;
                padding: 20px;
                text-align: center;
            }

            .portfolio-item:hover .portfolio-overlay {
                opacity: 1;
            }

            .portfolio-overlay h3 {
                font-size: 22px;
                margin-bottom: 10px;
            }

            /* How It Works */
            .steps {
                display: flex;
                justify-content: space-between;
                margin-top: 50px;
                position: relative;
            }

            .step {
                text-align: center;
                width: 23%;
                position: relative;
                z-index: 1;
            }

            .step-number {
                width: 60px;
                height: 60px;
                background-color: #b8860b;
                color: #fff;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 24px;
                font-weight: 700;
                margin: 0 auto 20px;
            }

            .step h3 {
                font-size: 20px;
                margin-bottom: 15px;
                color: #2a2a2a;
            }

            .steps-line {
                position: absolute;
                top: 30px;
                left: 15%;
                width: 70%;
                height: 2px;
                background-color: #ddd;
                z-index: 0;
            }

            /* Testimonials */
            .testimonials {
                background-color: #f9f9f9;
            }

            .testimonial-slider {
                max-width: 800px;
                margin: 0 auto;
                position: relative;
            }

            .testimonial {
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                text-align: center;
                display: none;
            }

            .testimonial.active {
                display: block;
            }

            .testimonial-text {
                font-size: 18px;
                font-style: italic;
                margin-bottom: 30px;
                color: #555;
            }

            .testimonial-author {
                font-weight: 600;
                color: #2a2a2a;
            }

            .testimonial-role {
                color: #b8860b;
                font-size: 14px;
                margin-top: 5px;
            }

            .slider-nav {
                display: flex;
                justify-content: center;
                margin-top: 30px;
            }

            .slider-dot {
                width: 12px;
                height: 12px;
                background-color: #ddd;
                border-radius: 50%;
                margin: 0 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .slider-dot.active {
                background-color: #b8860b;
            }

            /* CTA Section */
            .cta {
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
                background-size: cover;
                background-position: center;
                color: #fff;
                text-align: center;
                padding: 100px 0;
            }

            .cta h2 {
                font-family: 'Playfair Display', serif;
                font-size: 36px;
                margin-bottom: 20px;
            }

            .cta p {
                max-width: 700px;
                margin: 0 auto 30px;
                font-size: 18px;
            }

            /* Footer */
            footer {
                background-color: #2a2a2a;
                color: #fff;
                padding: 60px 0 20px;
            }

            .footer-content {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 30px;
                margin-bottom: 40px;
            }

            .footer-column h3 {
                font-size: 18px;
                margin-bottom: 20px;
                color: #b8860b;
            }

            .footer-column ul {
                list-style: none;
            }

            .footer-column ul li {
                margin-bottom: 10px;
            }

            .footer-column ul li a {
                color: #ccc;
                text-decoration: none;
                transition: color 0.3s;
            }

            .footer-column ul li a:hover {
                color: #b8860b;
            }

            .social-links {
                display: flex;
                margin-top: 20px;
            }

            .social-links a {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                margin-right: 10px;
                color: #fff;
                text-decoration: none;
                transition: background-color 0.3s;
            }

            .social-links a:hover {
                background-color: #b8860b;
            }

            .copyright {
                text-align: center;
                padding-top: 20px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                color: #999;
                font-size: 14px;
            }

            /* Form */
            .contact-form {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                margin-bottom: 8px;
                font-weight: 500;
                color: #2a2a2a;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                width: 100%;
                padding: 12px 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-family: 'Montserrat', sans-serif;
                font-size: 16px;
                transition: border-color 0.3s;
            }

            .form-group input:focus,
            .form-group textarea:focus,
            .form-group select:focus {
                border-color: #b8860b;
                outline: none;
            }

            .form-group textarea {
                min-height: 120px;
                resize: vertical;
            }

            /* Mobile Styles */
            @media (max-width: 992px) {
                .benefits-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .steps {
                    flex-direction: column;
                }

                .step {
                    width: 100%;
                    margin-bottom: 40px;
                }

                .steps-line {
                    display: none;
                }

                .footer-content {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                nav ul {
                    display: none;
                    position: absolute;
                    top: 80px;
                    left: 0;
                    width: 100%;
                    background-color: #fff;
                    flex-direction: column;
                    padding: 20px 0;
                    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                }

                nav ul.show {
                    display: flex;
                }

                nav ul li {
                    margin: 0;
                    text-align: center;
                    padding: 10px 0;
                }

                .mobile-menu-btn {
                    display: block;
                }

                .hero h1 {
                    font-size: 36px;
                }

                .hero p {
                    font-size: 16px;
                }

                .btn {
                    display: block;
                    width: 100%;
                    margin-bottom: 15px;
                }

                .btn-outline {
                    margin-left: 0;
                }

                .section {
                    padding: 60px 0;
                }

                .section-title h2 {
                    font-size: 30px;
                }

                .portfolio-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 576px) {
                .benefits-grid {
                    grid-template-columns: 1fr;
                }

                .footer-content {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <header>
            <div class="container header-container">
                <a href="#" class="logo">Tile<span>Master</span></a>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <nav>
                    <ul id="mainMenu">
                        <li><a href="#benefits">Преимущества</a></li>
                        <li><a href="#portfolio">Портфолио</a></li>
                        <li><a href="#process">Как это работает</a></li>
                        <li><a href="#reviews">Отзывы</a></li>
                        <li><a href="#contact">Сотрудничество</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1>Создавайте уникальные интерьеры с лучшими материалами</h1>
                    <p>Присоединяйтесь к сообществу дизайнеров TileMaster и получайте эксклюзивные условия сотрудничества, доступ к премиальным коллекциям и вознаграждение за каждого клиента.</p>
                    <a href="#contact" class="btn">Присоединиться</a>
                    <a href="#benefits" class="btn btn-outline">Узнать больше</a>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="section" id="benefits">
            <div class="container">
                <div class="section-title">
                    <h2>Почему дизайнерам выгодно работать с нами?</h2>
                    <p>Мы создали уникальные условия для дизайнеров интерьеров, которые хотят предлагать своим клиентам только лучшие материалы</p>
                </div>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <h3>Высокие комиссионные</h3>
                        <p>Получайте до 15% от суммы заказа вашего клиента. Чем больше вы продаете, тем выше ваш процент.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Эксклюзивные коллекции</h3>
                        <p>Доступ к ограниченным сериям и новинкам раньше других. Уникальные материалы для ваших проектов.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3>Персональный менеджер</h3>
                        <p>Выделенный специалист, который поможет с подбором материалов, оформлением заказов и решением любых вопросов.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3>Библиотека материалов</h3>
                        <p>Доступ к полной базе технических характеристик, сертификатов и инструкций по укладке всех материалов.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-photo-video"></i>
                        </div>
                        <h3>Профессиональный контент</h3>
                        <p>Готовые HD фото и 3D-визуализации всех коллекций для ваших презентаций и портфолио.</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3>Программа лояльности</h3>
                        <p>Бонусы, подарки и специальные условия для самых активных партнеров. Участвуйте в закрытых мероприятиях.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="section portfolio" id="portfolio">
            <div class="container">
                <div class="section-title">
                    <h2>Проекты наших партнеров</h2>
                    <p>Вдохновляйтесь реализованными проектами дизайнеров, которые уже сотрудничают с TileMaster</p>
                </div>
                <div class="portfolio-grid" id="portfolioGrid">
                    <!-- Portfolio items will be added by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="section" id="process">
            <div class="container">
                <div class="section-title">
                    <h2>Как начать сотрудничество?</h2>
                    <p>Всего 4 простых шага отделяют вас от начала прибыльного партнерства с TileMaster</p>
                </div>
                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <h3>Регистрация</h3>
                        <p>Заполните простую форму на нашем сайте и предоставьте информацию о своем опыте.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <h3>Верификация</h3>
                        <p>Наш менеджер свяжется с вами для подтверждения данных и обсуждения условий.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <h3>Доступ</h3>
                        <p>Получите персональный аккаунт с полным доступом ко всем материалам и инструментам.</p>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <h3>Первый проект</h3>
                        <p>Рекомендуйте нашу продукцию своим клиентам и получайте вознаграждение.</p>
                    </div>
                    <div class="steps-line"></div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="section testimonials" id="reviews">
            <div class="container">
                <div class="section-title">
                    <h2>Что говорят наши партнеры</h2>
                    <p>Отзывы дизайнеров, которые уже сотрудничают с TileMaster</p>
                </div>
                <div class="testimonial-slider">
                    <div class="testimonial active">
                        <p class="testimonial-text">"Сотрудничество с TileMaster значительно упростило мою работу. Теперь я могу предложить клиентам не только дизайн, но и качественные материалы с
                            гарантией. А комиссионные стали приятным дополнением к основному доходу."</p>
                        <p class="testimonial-author">Анна Смирнова</p>
                        <p class="testimonial-role">Дизайнер интерьеров, 7 лет опыта</p>
                    </div>
                    <div class="testimonial">
                        <p class="testimonial-text">"Благодаря эксклюзивным коллекциям TileMaster мои проекты стали более уникальными. Клиенты ценят, когда дизайнер может предложить что-то
                            действительно редкое и качественное."</p>
                        <p class="testimonial-author">Дмитрий Ковалев</p>
                        <p class="testimonial-role">Архитектор, студия "Пространство"</p>
                    </div>
                    <div class="testimonial">
                        <p class="testimonial-text">"Персональный менеджер - это то, что отличает TileMaster от других. Все вопросы решаются быстро, а клиенты всегда довольны сервисом. За последний
                            год 80% моих проектов были реализованы с их материалами."</p>
                        <p class="testimonial-author">Елена Ветрова</p>
                        <p class="testimonial-role">Дизайнер жилых интерьеров</p>
                    </div>
                    <div class="slider-nav">
                        <div class="slider-dot active" data-index="0"></div>
                        <div class="slider-dot" data-index="1"></div>
                        <div class="slider-dot" data-index="2"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <h2>Готовы увеличить свой доход с TileMaster?</h2>
                <p>Присоединяйтесь к более чем 500 дизайнерам, которые уже получают дополнительную прибыль от сотрудничества с нами</p>
                <a href="#contact" class="btn">Начать сотрудничество</a>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="section" id="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Стать партнером</h2>
                    <p>Заполните форму, и наш менеджер свяжется с вами для обсуждения условий сотрудничества</p>
                </div>
                <form class="contact-form" id="partnerForm">
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
                    <div class="form-group">
                        <label for="experience">Опыт работы (лет)</label>
                        <input type="number" id="experience" name="experience" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="portfolio">Ссылка на портфолио или сайт</label>
                        <input type="url" id="portfolio" name="portfolio">
                    </div>
                    <div class="form-group">
                        <label for="message">Дополнительная информация</label>
                        <textarea id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn">Отправить заявку</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>TileMaster</h3>
                        <p>Премиальная плитка и керамогранит для самых взыскательных проектов.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h3>Для дизайнеров</h3>
                        <ul>
                            <li><a href="#">Условия сотрудничества</a></li>
                            <li><a href="#">Каталог материалов</a></li>
                            <li><a href="#">Обучение</a></li>
                            <li><a href="#">Мероприятия</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Контакты</h3>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> Москва, ул. Дизайнеров, 15</li>
                            <li><i class="fas fa-phone"></i> +7 (495) 123-45-67</li>
                            <li><i class="fas fa-envelope"></i> designers@tilemaster.ru</li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Полезное</h3>
                        <ul>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">Тенденции</a></li>
                            <li><a href="#">Галерея проектов</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2023 TileMaster. Все права защищены.</p>
                </div>
            </div>
        </footer>

        <script>
            // JavaScript код будет здесь
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile menu toggle
                const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                const mainMenu = document.getElementById('mainMenu');

                mobileMenuBtn.addEventListener('click', function() {
                    mainMenu.classList.toggle('show');
                });

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();

                        if (this.getAttribute('href') === '#') return;

                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            // Close mobile menu if open
                            mainMenu.classList.remove('show');

                            window.scrollTo({
                                top: target.offsetTop - 80,
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Testimonial slider
                const testimonials = document.querySelectorAll('.testimonial');
                const dots = document.querySelectorAll('.slider-dot');
                let currentTestimonial = 0;

                function showTestimonial(index) {
                    testimonials.forEach(testimonial => testimonial.classList.remove('active'));
                    dots.forEach(dot => dot.classList.remove('active'));

                    testimonials[index].classList.add('active');
                    dots[index].classList.add('active');
                    currentTestimonial = index;
                }

                dots.forEach(dot => {
                    dot.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        showTestimonial(index);
                    });
                });

                // Auto-rotate testimonials
                setInterval(() => {
                    let nextIndex = (currentTestimonial + 1) % testimonials.length;
                    showTestimonial(nextIndex);
                }, 5000);

                // Portfolio grid
                const portfolioGrid = document.getElementById('portfolioGrid');
                const portfolioItems = [{
                        image: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Лофт апартаменты',
                        designer: 'Студия "Простор"'
                    },
                    {
                        image: 'https://images.unsplash.com/photo-1600210492493-0946911123ea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Ресторан "Модерн"',
                        designer: 'Анна Смирнова'
                    },
                    {
                        image: 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Загородный дом',
                        designer: 'Дмитрий Ковалев'
                    },
                    {
                        image: 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Квартира в центре',
                        designer: 'Елена Ветрова'
                    },
                    {
                        image: 'https://images.unsplash.com/photo-1600607688969-a5bfcd646154?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Отель "Премиум"',
                        designer: 'Студия "Интерьер"'
                    },
                    {
                        image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        title: 'Пентхаус',
                        designer: 'Алексей Петров'
                    }
                ];

                portfolioItems.forEach(item => {
                    const portfolioItem = document.createElement('div');
                    portfolioItem.className = 'portfolio-item';
                    portfolioItem.innerHTML = `
                    <img src="${item.image}" alt="${item.title}">
                    <div class="portfolio-overlay">
                        <h3>${item.title}</h3>
                        <p>Дизайнер: ${item.designer}</p>
                    </div>
                `;
                    portfolioGrid.appendChild(portfolioItem);
                });

                // Form submission
                const partnerForm = document.getElementById('partnerForm');

                partnerForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Here you would normally send the form data to the server
                    // For this example, we'll just show an alert

                    const formData = new FormData(this);
                    const formObject = {};
                    formData.forEach((value, key) => formObject[key] = value);

                    console.log('Form submitted:', formObject);

                    alert('Спасибо за вашу заявку! Наш менеджер свяжется с вами в ближайшее время.');
                    this.reset();

                    // Scroll to top
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

                // Sticky header on scroll
                window.addEventListener('scroll', function() {
                    const header = document.querySelector('header');
                    if (window.scrollY > 100) {
                        header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
                    } else {
                        header.style.boxShadow = 'none';
                    }
                });
            });
        </script>
    </body>

</html>
