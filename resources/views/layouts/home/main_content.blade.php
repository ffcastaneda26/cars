<div class="main-content-propio" id="result" >
    <div class="page-content">
        {{ $slot }}
         @yield('content')
        @stack('modals')
    </div>
</div>
