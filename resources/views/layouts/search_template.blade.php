<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.home.head')

<body class="font-sans antialiased" data-sidebar="light">
    <!-- Wrapper -->
    <div id="layout-wrapper">
        @if (isset($header))
            <header class="bg-white">
                <div class="d-flex">
                    {{ $header }}
                </div>
            </header>
        @endif

        @include('layouts.home.header_div')

        @include('layouts.home.main_content')

    </div>

    @livewireScripts
    {{-- Javascripts --}}
    @include('layouts.home.javascript_files')
    @yield('scripts')
</body>
</html>
