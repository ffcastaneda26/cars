<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <link href="/admiria/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{--  <link href="/admiria/assets/css/icons.min.css" rel="stylesheet" type="text/css">  --}}
    <link rel="stylesheet" href="{{asset('admiria/assets/css/icons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- App Css-->
    <link href="/admiria/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Css-->

    <link href="/admiria/assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/admiria/assets/css/font.css" rel="stylesheet" type="text/css">



    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- add to document <head> -->
    @livewireStyles
    <!-- Scripts -->
    {{--  <script src="/admiria/assets/js/my_functions.js"></script>  --}}
    {{--   <script src="{{ mix('js/app.js') }}" defer></script>  --}}
</head>
