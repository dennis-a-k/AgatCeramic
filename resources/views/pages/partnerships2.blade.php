<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeramicHub - Площадка для дизайнеров</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #e74c3c;
            --light: #ecf0f1;
            --dark: #1a252f;
            --accent: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header */
        header {
            background-color: var(--primary);
            color: white;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .logo span {
            color: var(--secondary);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--secondary);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            padding-top: 80px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: var(--secondary);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Sections */
        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--primary);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary);
        }

        /* Benefits */
        .benefits {
            background-color: var(--light);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .benefit-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
        }

        .benefit-card i {
            font-size: 50px;
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .benefit-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--primary);
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .overlay {
            transform: translateY(0);
        }

        /* Form */
        .contact-form {
            background-color: var(--light);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background-color: var(--primary);
            color: white;
            padding: 50px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--secondary);
        }

        .footer-column p {
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            color: white;
            font-size: 20px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--secondary);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }

            nav ul {
                margin-top: 20px;
            }

            nav ul li {
                margin-left: 15px;
                margin-right: 15px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            section {
                padding: 60px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">Ceramic<span>Hub</span></a>
            <nav>
                <ul>
                    <li><a href="#benefits">Преимущества</a></li>
                    <li><a href="#clients">Клиентам</a></li>
                    <li><a href="#gallery">Галерея</a></li>
                    <li><a href="#contact">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Создавайте уникальные интерьеры с лучшей плиткой</h1>
                <p>Присоединяйтесь к нашей платформе как дизайнер и получайте доступ к эксклюзивным коллекциям, заказы
                    от клиентов и высокие комиссионные</p>
                <a href="#contact" class="btn">Присоединиться</a>
            </div>
        </div>
    </section>

    <!-- Benefits for Designers -->
    <section id="benefits" class="benefits">
        <div class="container">
            <div class="section-title">
                <h2>Почему дизайнерам выгодно с нами</h2>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="fas fa-wallet"></i>
                    <h3>Высокие комиссионные</h3>
                    <p>До 25% от стоимости заказа за рекомендацию наших материалов клиентам</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-palette"></i>
                    <h3>Эксклюзивные коллекции</h3>
                    <p>Доступ к уникальным дизайнам, которых нет в свободной продаже</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-users"></i>
                    <h3>Готовые клиенты</h3>
                    <p>Мы привлекаем клиентов, вам остается только консультировать</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>Персональный кабинет</h3>
                    <p>Удобный инструмент для управления проектами и заказами</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Обучение и поддержка</h3>
                    <p>Регулярные вебинары, тренинги и консультации от производителей</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-medal"></i>
                    <h3>Повышение репутации</h3>
                    <p>Ваши работы в нашем портфолио повышают ваш авторитет</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits for Clients -->
    <section id="clients">
        <div class="container">
            <div class="section-title">
                <h2>Выгоды для ваших клиентов</h2>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="fas fa-percentage"></i>
                    <h3>Скидки от партнеров</h3>
                    <p>Ваши клиенты получают специальные условия на мебель и сантехнику</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Гарантия качества</h3>
                    <p>Мы работаем только с проверенными производителями</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-truck"></i>
                    <h3>Бесплатная доставка</h3>
                    <p>При заказе от определенной суммы - доставка в подарок</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-calculator"></i>
                    <h3>3D-визуализация</h3>
                    <p>Помогаем клиентам увидеть результат до покупки</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-clock"></i>
                    <h3>Экономия времени</h3>
                    <p>Все материалы в одном месте - не нужно искать по разным магазинам</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-hands-helping"></i>
                    <h3>Полный цикл</h3>
                    <p>От дизайна до укладки - все услуги у проверенных мастеров</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="section-title">
                <h2>Наши работы</h2>
            </div>
            <div class="gallery" id="galleryContainer">
                <!-- Gallery items will be added via JS -->
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Присоединиться к команде</h2>
            </div>
            <div class="contact-form">
                <form id="joinForm">
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
                        <select id="experience" name="experience" required>
                            <option value="">Выберите вариант</option>
                            <option value="1-3">1-3 года</option>
                            <option value="3-5">3-5 лет</option>
                            <option value="5+">Более 5 лет</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="portfolio">Ссылка на портфолио</label>
                        <input type="url" id="portfolio" name="portfolio">
                    </div>
                    <div class="form-group">
                        <label for="message">Почему вы хотите с нами сотрудничать?</label>
                        <textarea id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn">Отправить заявку</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>О нас</h3>
                    <p>CeramicHub - ведущая платформа для дизайнеров интерьеров, работающих с керамической плиткой и
                        керамогранитом.</p>
                    <p>Мы объединяем лучших специалистов и производителей для создания уникальных пространств.</p>
                </div>
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Москва, ул. Дизайнеров, 15</p>
                    <p><i class="fas fa-phone"></i> +7 (495) 123-45-67</p>
                    <p><i class="fas fa-envelope"></i> info@ceramichub.ru</p>
                </div>
                <div class="footer-column">
                    <h3>Мы в соцсетях</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                    </div>
                    <p>Подписывайтесь, чтобы быть в курсе новинок и акций</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 CeramicHub. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <script>
        // Gallery Data
        const galleryData = [
            {
                image: 'https://images.unsplash.com/photo-1600210492493-0946911123ea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Современная кухня',
                designer: 'Анна Смирнова'
            },
            {
                image: 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Элитная ванная',
                designer: 'Иван Петров'
            },
            {
                image: 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Гостиная с камином',
                designer: 'Елена Ковалева'
            },
            {
                image: 'https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Спальня в стиле лофт',
                designer: 'Дмитрий Соколов'
            },
            {
                image: 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Каминная зона',
                designer: 'Ольга Морозова'
            },
            {
                image: 'https://images.unsplash.com/photo-1600210491892-03d54c0aaf87?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                title: 'Стильная прихожая',
                designer: 'Алексей Волков'
            }
        ];

        // Populate Gallery
        const galleryContainer = document.getElementById('galleryContainer');

        galleryData.forEach(item => {
            const galleryItem = document.createElement('div');
            galleryItem.className = 'gallery-item';

            galleryItem.innerHTML = `
                <img src="${item.image}" alt="${item.title}">
                    <div class="overlay">
                        <h4>${item.title}</h4>
                        <p>Дизайнер: ${item.designer}</p>
                    </div>
                    `;

            galleryContainer.appendChild(galleryItem);
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Form Submission
        const joinForm = document.getElementById('joinForm');

        joinForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Get form values
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                experience: document.getElementById('experience').value,
                portfolio: document.getElementById('portfolio').value,
                message: document.getElementById('message').value
            };

            // Here you would typically send the data to a server
            console.log('Form submitted:', formData);

            // Show success message
            alert('Спасибо за вашу заявку! Мы свяжемся с вами в ближайшее время.');

            // Reset form
            joinForm.reset();
        });

        // Sticky Header
        window.addEventListener('scroll', function () {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
            } else {
                header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>

</html>
