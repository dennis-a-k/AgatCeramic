@extends('layouts.main')

@section('title', 'Роспись плитки | ')

@section('seo')
    <meta name="description"
        content="Авторская роспись керамической плитки для интерьера. Эскизы от художников, экологичные краски, долговечное покрытие. Доставка по Москве и МО.">
    <meta property="og:title" content="Художественная роспись плитки для дома и офиса в {{ config('app.name') }}">
    <meta property="og:description"
        content="Создаем эксклюзивную плитку с ручной росписью. Безопасные материалы, индивидуальные эскизы, срочное исполнение.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('assets/images/stock/logo.png') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:url" content="{{ route('rospis') }}">
@endsection

@section('content')
    <main class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <h1 class="h1 text-center mb-5">Художественная роспись плитки для дома и офиса</h1>

            <section class="mb-5" style="text-align: justify;">
                <h2 class="h3 text-center">Технология и этапы</h2>
                <p>
                    &nbsp;&nbsp;&nbsp;<strong>Ручная роспись керамической плитки</strong> – это гармония современных технологий и творческого мастерства. Процесс начинается с создания эскиза: дизайнер разрабатывает уникальный рисунок или адаптирует готовый мотив, после чего изображение переносится на шаблон.
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;Перед нанесением узора плитка проходит специальную подготовку – поверхность грунтуется, чтобы обеспечить лучшее сцепление с красками. Затем художник вручную прорисовывает контуры и детали, используя термостойкие пигменты, устойчивые к внешним воздействиям.
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;Финальный этап – обжиг в печи при экстремальных температурах. Это позволяет закрепить изображение, делая его износостойким и сохраняя насыщенность цветов на десятилетия.
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;Роспись плитки – сложный и кропотливый процесс, требующий профессиональных навыков. Малейшая неточность может исказить замысел, поэтому доверить такую работу стоит только экспертам. Студия Agat Ceramic предлагает авторскую роспись с гарантией качества – от эскиза до финального обжига.
                </p>
                <div class="row justify-content-center">
                    <div class="w-50 row justify-content-center">
                        <img src="{{ asset('assets/images/rospis/rospis_1.jpg') }}" class="col-6 clickable-image" alt="Художественная роспись плитки для дома и офиса">
                        <img src="{{ asset('assets/images/rospis/rospis_2.jpg') }}" class="col-4 clickable-image" alt="Художественная роспись плитки для дома и офиса">
                    </div>

                </div>
            </section>

            <section class="mb-5" style="text-align: justify;">
                <h2 class="h3 text-center">Виды рисунков: стили и образы</h2>
                <p>
                    &nbsp;&nbsp;&nbsp;Керамические рисунки открывают безграничные возможности для творчества. Вы можете выбрать любой стиль: от классической русской росписи до современных абстракций, от этнических орнаментов майя до изысканных пейзажей и даже репродукций известных полотен. В Agat Ceramic ваши идеи превращаются в уникальные художественные решения. Важно лишь четко сформулировать задачу и правильно расставить акценты. Если вы затеяли ремонт, лучше заранее продумать концепцию оформления, чтобы добиться гармоничного результата.
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;Декоративная роспись наносится на любую керамическую плитку — матовую, глянцевую, напольную, настенную. Она идеально подходит для оформления кухонных фартуков, зон вокруг бассейнов, печей, лестниц, санузлов и других интерьерных элементов.
                </p>
                <div class="row justify-content-center">
                    <div class="w-50 row justify-content-center">
                        <img src="{{ asset('assets/images/rospis/rospis_3.jpg') }}" class="col-4 clickable-image" alt="Художественная роспись плитки для дома и офиса">
                        <img src="{{ asset('assets/images/rospis/rospis_4.jpg') }}" class="col-4 clickable-image" alt="Художественная роспись плитки для дома и офиса">
                        <img src="{{ asset('assets/images/rospis/rospis_5.jpg') }}" class="col-4 clickable-image" alt="Художественная роспись плитки для дома и офиса">
                    </div>
                </div>
            </section>

            <section class="mb-5" style="text-align: justify;">
                <h2 class="h3 text-center">Преимущества художественной росписи</h2>
                <p>
                    &nbsp;&nbsp;&nbsp;Сегодня в отделке интерьеров используются безопасные и долговечные материалы, а художественная роспись открывает безграничные возможности для дизайна. Вот её ключевые преимущества:
                </p>
                <ul class="mb-5">
                    <li>&nbsp;&nbsp;&nbsp;✔ Неограниченный творческий потенциал — можно воплотить любые идеи, от минималистичных узоров до сложных сюжетных композиций.</li>
                    <li>&nbsp;&nbsp;&nbsp;✔ Экологичность и безопасность — материалы гипоаллергенны, подходят для домов с детьми, животными и общественных пространств.</li>
                    <li>&nbsp;&nbsp;&nbsp;✔ Высокая износостойкость — покрытие устойчиво к истиранию, влаге и механическим воздействиям, сохраняя яркость более 10 лет.</li>
                    <li>&nbsp;&nbsp;&nbsp;✔ Гибкость применения — можно украсить как отдельные акцентные зоны, так и создать масштабные панно.</li>
                </ul>
                <p>
                    &nbsp;&nbsp;&nbsp;В каталоге Agat Ceramic представлена разнообразная плитка с готовыми принтами, способная удовлетворить большинство запросов. Но если вы хотите по-настоящему уникальный интерьер, отражающий ваш вкус и эмоции, индивидуальная роспись станет идеальным решением. Это шанс наполнить пространство смыслом, сделав каждый элемент частью вашей личной истории.
                </p>
            </section>
        </div>

        <div id="imageModal">
            <span class="close-modal">&times;</span>
            <img id="fullSizeImage" src="" class="img-fluid">
        </div>
    </main>
@endsection

@section('css')
    <style>
        #imageModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            z-index: 1000;
            text-align: center;
            overflow-y: auto;
        }

        #fullSizeImage {
            max-width: 90%;
            max-height: 90vh;
            margin: 5vh auto;
            display: block;
        }

        .close-modal {
            position: fixed;
            top: 15px;
            right: 35px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            z-index: 1001;
        }

        .clickable-image {
            cursor: pointer;
        }
    </style>
@endsection

@section('js')
    <script>
        document.querySelectorAll('.clickable-image').forEach(img => {
            img.addEventListener('click', function() {
                document.getElementById('fullSizeImage').src = this.src;
                document.getElementById('imageModal').style.display = 'block';
                document.body.classList.add('modal-open');
            });
        });

        document.querySelector('.close-modal').addEventListener('click', function() {
            document.getElementById('imageModal').style.display = 'none';
            document.body.classList.remove('modal-open');
        });

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.classList.remove('modal-open');
            }
        });
    </script>
@endsection
