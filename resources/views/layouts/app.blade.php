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

    .equipo_ganador{
        background-color: green;
    }

    .equipo_perdedor{
        background-color: red;
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



    </script>
    <!-- add before </body> -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    {{-- CK-Editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

</body>
</html>
