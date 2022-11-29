<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div class="text-sm-end d-none d-sm-block">
                    <script>document.write(new Date().getFullYear())</script> © {{ config('app.name')}}.
                </div>

                <div class="d-flex justify-content-end fs-5">
                    <span>{{ __('Made in ')}}</span>
                    <a href="https://koddeplus.com/"
                        target="_blank"> , {{ env('APP_COPYRIGHT','Koddeplus') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
