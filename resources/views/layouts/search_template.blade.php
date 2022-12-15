<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.home.head')
<style>
    .modal {
        background-color: rgba(0, 0, 0, 0.7);
    }

    body {
        font-family: 'Nunito', sans-serif;
        heigh:665px;
        background-color:#FFFFFF;
    }
</style>

<body class="font-sans antialiased" data-sidebar="light">
    <!-- Wrapper -->
    <div id="layout-wrapper">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white">
                <div class="d-flex">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- ===== Etiqueta header -->
        @include('layouts.searching.header_div')

        <!-- ========== Left Sidebar Start ========== -->

       @include('livewire.searching.left_sidebar')


        <!-- Contenido Principal -->
        @include('layouts.home.main_content')

        <!--Pie de página -->
        {{-- @include('layouts.home.footer') --}}
    </div>

    @livewireScripts
    {{-- Javascripts --}}
    @include('layouts.home.javascript_files')
    @yield('scripts')
</body>
</html>
