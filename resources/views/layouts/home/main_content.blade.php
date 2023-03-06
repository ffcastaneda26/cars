<div class="{{ Auth::check() ? 'main-content-with-leftsidebar' : 'main-content-without-leftsidebar' }}" id="result" >
    <div class="page-content">
        {{ $slot }}
         @yield('content')
        @stack('modals')
    </div>
</div>
