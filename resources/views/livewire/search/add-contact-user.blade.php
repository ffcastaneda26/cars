<div>
   <div class="vehicle-alignleft">
        @auth
            <x-jet-button wire:click="add_contact_user({{ $vehicle->id }})"  
                class="btn btn-dark {{ $enable_button_contact ? '' : 'disabled'}} ">
                    <b>{{ __($button_contact_label) }} </b>
            </x-jet-button>
        @else
            <x-jet-button class="btn bbtn-dark waves-effect">
                <a wire:click="add_contact_user({{ $vehicle->id }})" class=" text-white">{{ __($button_contact_label) }}</a>
            </x-jet-button>
        @endauth
    </div>
</div>
@section('scripts')
    <script>
        window.addEventListener('refresh_page', event => {
            window.location.reload();
        })
    </script>

@endsection