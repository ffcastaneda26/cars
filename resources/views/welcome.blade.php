<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.typekit.net/xdc8egp.css">
        <style>
            h4{
                font-family: prenton-condensed, sans-serif;
                font-weight: 400;
                font-style: normal;
            }
            label{
                font-family: prenton-condensed, sans-serif;
                font-weight: 700;
                font-style: normal;
            }
            #layout-wrapper {
                background-size:cover;
                background-image: url('assets/images/bg_responsive_cicis.png');
            }
            .card {
                max-width: 20rem;
                background-color:#EAE9DF;
                border-radius: 25px;
                margin-top: 35%;
            }
            @media only screen and (min-width: 500px) {
                #layout-wrapper {
                    background-image: url('assets/images/bg_min_completed.png');
                }
                .card {
                    max-width: 25rem;
                    background-color:#EAE9DF;
                    border-radius: 25px;
                    margin-top: 1px;
                }
            }
        </style>
        @livewireStyles
    </head>

    <body>
        <div class="responsive">
            @livewire('customer-controller')
        </div>
        @livewireScripts
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="/admiria/assets/js/my_functions.js"></script>
    </body>
</html>
