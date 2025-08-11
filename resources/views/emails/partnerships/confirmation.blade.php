<!DOCTYPE html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Подтверждение заявки на сотрудничество с {{ config('app.name') }}</title>
        <style>
            body {
                margin: 0;
                padding: 10px 0;
                background-color: #f9f9f9;
                color: #000;
            }

            .email-container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #ffffff;
                border: 1px solid #f9f9f9;
                border-radius: 8px;
                overflow: hidden;
            }

            .header {
                background-color: #788da3;
                color: #ffffff;
                padding: 20px;
                text-align: center;
            }

            .header h1 {
                margin: 0;
                font-size: 24px;
                font-weight: 600;
            }

            .content {
                padding: 20px;
            }

            .content h2 {
                font-size: 20px;
                margin-bottom: 10px;
                font-weight: 600;
            }

            .footer {
                background-color: #eef1f5;
                color: #000;
                padding: 15px;
                text-align: center;
                font-size: 14px;
            }

            .footer a {
                color: #788da3;
                text-decoration: none;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="header">
                <h1>{{ config('app.name') }}</h1>
            </div>
            <div class="content">
                <h2>Здравствуйте, {{ $call->name }}!</h2>
                <p>Вы оставили заявку на сотрудничество с нашим магазином</p>
                <p>Контактные данные связи которые вы указали:</p>
                <ul>
                    <li><strong>Почта: </strong> {{ $call->email }}</li>
                    <li><strong>Телефон: </strong> {{ $call->phone }}</li>
                </ul>
            </div>
            <div class="footer">
                <h2>Мы свяжемся с вами в ближайшее время.</h2>
                <p>Если у вас возникли вопросы, свяжитесь с нами:</p>
                <p>Email: <a href="mailto:{{ $appData->app_email ?? '---' }}">{{ $appData->app_email ?? '---' }}</a> | Телефон: <a
                        href="tel:{{ $appData->app_phone ?? '---' }}">{{ $appData->appPhoneFormatted ?? '---' }}</a>
                </p>
                <p>Спасибо, что выбрали {{ config('app.name') }}!</p>
            </div>
        </div>
    </body>

</html>
