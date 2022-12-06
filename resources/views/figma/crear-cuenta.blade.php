<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="stylesheet" href="{{asset('images/favicon.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="/admiria/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- App Css-->
    <link href="/admiria/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Css-->
    <link href="/admiria/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/font.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- add to document <head> -->
    @livewireStyles
    <link rel="stylesheet" href="{{asset('images/favicon.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="/admiria/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- App Css-->
    <link href="/admiria/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Css-->
    <link href="/admiria/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/font.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- add to document <head> -->
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('figma/css/crear-cuenta/css/main.css') }}" />
    <title>Crear Cuenta</title>
</head>

<body>

    <div class="v75_100">
        <span class="v75_105">
            LOGIN
        </span>

        <div class="name"></div>

            <span class="v75_111">Crea una Cuenta</span>
            <span class="v75_112">Nombre</span>
            <span class="v75_113">Email</span>
            <span class="v87_143">Contraseña</span>
            <span class="v244_2">Confirmar Contraseña</span>

        <div class="v75_116">
            <div class="v75_117"></div><span class="v75_118">Log In</span>
        </div>

        
            <div class="btn btn-lg">
                <span class="v88_145">
                    Boton Crear Cuenta
                </span>

            </div>
        <span class="v75_122">
            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </span>

        <span class="v75_123">
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />

        </span>
        <span class="v75_124">
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

        </span>
        <span class="v244_4">
            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </span>
        <span class="v75_125">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </span>


        <div class="v100_102">
            <div class="v100_103"></div><span class="v100_104">ENG</span>
            <div class="v100_105">
                <div class="v100_106"></div>
                <div class="v100_107"></div>
                <div class="v100_108"></div>
                <div class="v100_109"></div>
                <div class="v100_110"></div>
                <div class="v100_111"></div>
                <div class="v100_112">
                    <div class="v100_113"></div>
                    <div class="v100_114"></div>
                    <div class="v100_115"></div>
                    <div class="v100_116"></div>
                    <div class="v100_117"></div>
                    <div class="v100_118"></div>
                    <div class="v100_119"></div>
                    <div class="v100_120"></div>
                    <div class="v100_121"></div>
                    <div class="v100_122"></div>
                    <div class="v100_123"></div>
                    <div class="v100_124"></div>
                    <div class="v100_125"></div>
                    <div class="v100_126"></div>
                </div>
                <div class="v100_127"></div>
                <div class="v100_128"></div>
            </div>
            <div class="v100_129">
                <div class="v100_130"></div>
            </div>
        </div>
        <div class="v235_3"></div>
    </div>
</body>

</html>
