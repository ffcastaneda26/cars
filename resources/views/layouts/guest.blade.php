<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            body {
                margin: 0;
            }

            .container{
                display: grid;
                grid-template-columns: 1fr 2fr;
                height: 100vh;
            }

            .left{
                display: flex;
            }

  

            .left-contenido  {
                margin-top: 40px;
            }

            .right {
                display: flex;
                align-items: start;
                justify-content: start;
                margin-left: 70px;
                margin-top: 15px;
            }

            .right-headings {
                text-align: start;
                color: rgb(250, 67, 6);
                padding: 20px;
            }

            .right-headings  h1{
                font-size: 50px;
                font-weight: bold;
            }

            .right-headings h2 {
                font-size: 35px;
                font-weight: bold;
            }
            .right-headings h4 {
                font-size: 20px;
            }

        </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
