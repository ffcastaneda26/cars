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

        @include('layouts.searching.header_div')

        @include('livewire.search.left_sidebar')

        @include('layouts.home.main_content')

        {{-- @include('layouts.home.footer') --}}
    </div>

    @livewireScripts
    {{-- Javascripts --}}
    @include('layouts.home.javascript_files')
    @yield('scripts')
</body>
</html>
