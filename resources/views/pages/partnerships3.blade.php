<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TileMaster Pro | Сотрудничество для дизайнеров</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
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
            scroll-behavior: smooth;
        }

        .fullscreen-section {
            height: 100vh;
            width: 100%;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            position: relative;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .section-content.visible {
            opacity: 1;
            transform: translateY(0);
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .btn {
            display: inline-block;
            background-color: #b8860b;
            color: #fff;
            padding: 15px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.4s;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.6s ease-out 0.3s;
        }

        .btn.visible {
            transform: scale(1);
            opacity: 1;
        }

        .btn:hover {
            background-color: #a67c10;
            transform: scale(1.05);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid #fff;
            margin-left: 15px;
        }

        .btn-outline:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .section-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            transform: scale(1.1);
            transition: transform 8s ease-out;
        }

        .section-bg.zoomed {
            transform: scale(1);
        }

        .section-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        /* Navigation */
        .scroll-nav {
            position: fixed;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            margin: 10px 0;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }

        .nav-dot.active {
            background-color: #b8860b;
            transform: scale(1.3);
        }

        .nav-dot::after {
            content: attr(data-title);
            position: absolute;
            right: 25px;
            /* Изменено с left на right */
            top: 50%;
            transform: translateY(-50%);
            white-space: nowrap;
            color: white;
            font-size: 14px;
            background-color: rgba(42, 42, 42, 0.8);
            padding: 5px 10px;
            border-radius: 4px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .nav-dot:hover::after {
            opacity: 1;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        header.scrolled {
            background-color: rgba(42, 42, 42, 0.9);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        header.scrolled .logo {
            color: #fff;
        }

        .logo span {
            color: #b8860b;
        }

        .cta-btn {
            background-color: #b8860b;
            color: #fff;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .cta-btn:hover {
            background-color: #a67c10;
            transform: translateY(-2px);
        }

        /* Specific sections */
        #hero {
            color: #fff;
            text-align: center;
        }

        #hero h1 {
            font-size: 64px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        #hero p {
            font-size: 22px;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .benefit-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
            transform: translateX(-50px);
            opacity: 0;
            transition: all 0.8s ease-out;
        }

        .benefit-card.visible {
            transform: translateX(0);
            opacity: 1;
        }

        .benefit-card h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #2a2a2a;
        }

        .benefit-card p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .benefit-icon {
            font-size: 50px;
            color: #b8860b;
            margin-bottom: 20px;
        }

        /* Form section */
        #contact {
            background-color: #f9f9f9;
            color: #333;
        }

        #contact .section-overlay {
            background: rgba(42, 42, 42, 0.7);
        }

        .contact-form {
            background-color: #fff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            transform: scale(0.9);
            opacity: 0;
            transition: all 0.8s ease-out;
        }

        .contact-form.visible {
            transform: scale(1);
            opacity: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #b8860b;
            outline: none;
            box-shadow: 0 0 0 3px rgba(184, 134, 11, 0.2);
        }

        /* Footer */
        footer {
            background-color: #2a2a2a;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .floating {
            animation: float 4s ease-in-out infinite;
        }

        /* Responsive */
        @media (max-width: 992px) {
            #hero h1 {
                font-size: 48px;
            }

            #hero p {
                font-size: 18px;
            }

            .benefit-card {
                padding: 30px;
            }

            .benefit-card h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 768px) {
            #hero h1 {
                font-size: 36px;
            }

            .scroll-nav {
                right: 15px;
            }

            .header-container {
                padding: 0 20px;
            }

            .section-content {
                padding: 0 20px;
            }

            .btn {
                display: block;
                width: 100%;
                margin-bottom: 15px;
            }

            .btn-outline {
                margin-left: 0;
            }

            .scroll-nav {
                right: 15px;
            }

            .nav-dot::after {
                right: 20px;
                /* Уменьшаем отступ для мобильных */
            }
        }

        @media (max-width: 576px) {
            #hero h1 {
                font-size: 28px;
            }

            .benefit-card {
                padding: 20px;
            }

            .contact-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Dots -->
    <div class="scroll-nav">
        <div class="nav-dot active" data-title="Главная" data-section="hero"></div>
        <div class="nav-dot" data-title="Высокие комиссии" data-section="commission"></div>
        <div class="nav-dot" data-title="Эксклюзивные материалы" data-section="exclusive"></div>
        <div class="nav-dot" data-title="Персональный менеджер" data-section="manager"></div>
        <div class="nav-dot" data-title="Готовый контент" data-section="content"></div>
        <div class="nav-dot" data-title="Присоединиться" data-section="contact"></div>
    </div>

    <!-- Header -->
    <header id="mainHeader">
        <div class="header-container">
            <a href="#" class="logo">Tile<span>Master</span></a>
            <a href="#contact" class="cta-btn">Присоединиться</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="fullscreen-section" id="hero">
        <img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Дизайн интерьера" class="section-bg">
        <div class="section-overlay"></div>
        <div class="section-content">
            <h1>Превратите ваши проекты в источник дохода</h1>
            <p>Присоединяйтесь к сообществу дизайнеров TileMaster и получайте до 15% с каждого заказа ваших клиентов</p>
            <a href="#contact" class="btn">Начать сотрудничество</a>
            <a href="#commission" class="btn btn-outline">Узнать подробности</a>
        </div>
    </section>

    <!-- Commission Section -->
    <section class="fullscreen-section" id="commission">
        <img src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Высокие комиссионные" class="section-bg">
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

    <!-- Exclusive Section -->
    <section class="fullscreen-section" id="exclusive">
        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Эксклюзивные материалы" class="section-bg">
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

    <!-- Manager Section -->
    <section class="fullscreen-section" id="manager">
        <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Персональный менеджер" class="section-bg">
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

    <!-- Content Section -->
    <section class="fullscreen-section" id="content">
        <img src="https://images.unsplash.com/photo-1600607688969-a5bfcd646154?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Готовый контент" class="section-bg">
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

    <!-- Contact Section -->
    <section class="fullscreen-section" id="contact">
        <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
            alt="Присоединиться" class="section-bg">
        <div class="section-overlay"></div>
        <div class="section-content">
            <form class="contact-form" id="partnerForm">
                <h2>Стать партнером TileMaster</h2>
                <p>Заполните форму, и наш менеджер свяжется с вами для обсуждения условий сотрудничества</p>

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

                <button type="submit" class="btn">Отправить заявку</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2023 TileMaster. Все права защищены.</p>
            <p>Сотрудничество с лучшими дизайнерами интерьеров</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Elements
            const sections = document.querySelectorAll('.fullscreen-section');
            const navDots = document.querySelectorAll('.nav-dot');
            const header = document.getElementById('mainHeader');

            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1 // Уменьшаем порог срабатывания
            };

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Animate section content
                        const content = entry.target.querySelector('.section-content');
                        if (content) content.classList.add('visible');

                        // Animate buttons
                        const buttons = entry.target.querySelectorAll('.btn');
                        buttons.forEach(btn => {
                            if (!btn.classList.contains('visible')) {
                                btn.classList.add('visible');
                            }
                        });

                        // Zoom background
                        const bg = entry.target.querySelector('.section-bg');
                        if (bg && !bg.classList.contains('zoomed')) {
                            bg.classList.add('zoomed');
                        }

                        // Animate benefit cards and contact form
                        const cards = entry.target.querySelectorAll('.benefit-card, .contact-form');
                        cards.forEach(card => {
                            if (!card.classList.contains('visible')) {
                                card.classList.add('visible');
                            }
                        });

                        // Update navigation dots
                        const sectionId = entry.target.id;
                        navDots.forEach(dot => {
                            dot.classList.toggle('active', dot.dataset.section === sectionId);
                        });
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });

            // Остальной код остается без изменений
            // Navigation dots click handler
            navDots.forEach(dot => {
                dot.addEventListener('click', function () {
                    const sectionId = this.dataset.section;
                    const section = document.getElementById(sectionId);

                    if (section) {
                        window.scrollTo({
                            top: section.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Header scroll effect
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Form submission
            const partnerForm = document.getElementById('partnerForm');

            partnerForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Form data collection
                const formData = new FormData(this);
                const formObject = {};
                formData.forEach((value, key) => formObject[key] = value);

                console.log('Form submitted:', formObject);

                // Show success message
                alert('Спасибо за вашу заявку! Наш менеджер свяжется с вами в ближайшее время.');
                this.reset();

                // Scroll to top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Initialize first section
            const firstSection = document.querySelector('.fullscreen-section');
            if (firstSection) {
                const content = firstSection.querySelector('.section-content');
                if (content) content.classList.add('visible');

                const bg = firstSection.querySelector('.section-bg');
                if (bg) bg.classList.add('zoomed');

                const buttons = firstSection.querySelectorAll('.btn');
                buttons.forEach(btn => btn.classList.add('visible'));

                const cards = firstSection.querySelectorAll('.benefit-card, .contact-form');
                cards.forEach(card => card.classList.add('visible'));
            }
        });
    </script>
</body>

</html>
