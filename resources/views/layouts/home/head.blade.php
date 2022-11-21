<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="shortcut icon"  href="{{asset('images/logo_2.png')}}">

    <!-- Bootstrap Css -->

    {{-- <link href="/admiria/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Icons Css -->
    <link href="/admiria/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- App Css-->
    <link href="/admiria/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Css-->
    <link href="/admiria/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/font.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- add to document <head> -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    @livewireStyles
    <!-- Scripts -->
    {{--  <script src="/admiria/assets/js/my_functions.js"></script>  --}}
    {{--   <script src="{{ mix('js/app.js') }}" defer></script>  --}}
</head>
