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

    .stepwizard-step p {
        margin-top: 10px;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 6px 0;
      font-size: 12px;
      line-height: 1.428571429;
      border-radius: 15px;
    }
    .displayNone{
      display: none;
    }
</style>
<body class="font-sans antialiased" data-sidebar="dark">
    <!-- Loader -->
    @include('layouts.home.loader')

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
        @include('layouts.home.header_div')

        <!-- ========== Left Sidebar Start ========== -->
        @auth
        {{-- TODO: Cambiar a si es administrador --}}
            {{-- @if(!Auth::user()->isClient()) --}}
                @include('layouts.home.left_sidebar')
            {{-- @endif --}}
        @endauth

        <!-- Contenido Principal -->
        @include('layouts.home.main_content')

        <!--Pie de página -->
        @include('layouts.home.footer')
    </div>

    @livewireScripts
    {{-- @stack('js') --}}
    <!-- JAVASCRIPT2 -->
    @include('layouts.home.javascript_files')
    @yield('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })


        function confirm_modal(id) {
            var record = id;
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('You wo not be able to revert this!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, delete it!') }}",
                cancelButtonText: "{{ __('Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('destroy', record);
                    Swal.fire(
                        "{{ __('Deleted!') }}",
                        "{{ __('Your record has been deleted.') }}",
                        'success'
                    )
                }
            })
        }

        function confirm_register_competidor() {
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('The code can only be used to consult your picks') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2ECC71',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes, save my picks') }}",
                cancelButtonText: "{{ __('Cancel') }}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('validate_picks');
                 }
            })
        }


    </script>
    <!-- add before </body> -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    {{-- CK-Editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

</body>
</html>
