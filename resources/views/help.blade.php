<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Документация</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            Информация по сервису:
            <ul>
                <li>Сокращение ссылки доступно по /api/links/</li>
                <li>Получение длинной ссылки по короткой доступно по /api/links/{короткая часть}</li>
                <li>Данная страница - /api/help</li>
                <li>base url указан в .env файле</li>
            </ul>

            Итого: 4 роута:
            <ul>
                <li>Получение короткой ссылки по длинной</li>
                <li>Получение длинной ссылки по короткой</li>
                <li>Страница документации(вы здесь)</li>
                <li>Редирект</li>
            </ul>
        </div>

    </body>
</html>
