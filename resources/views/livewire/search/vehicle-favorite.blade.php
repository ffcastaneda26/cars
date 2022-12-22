<div>
    @auth
        <a wire:click="add_to_my_favorites({{ $vehicle->id }})" class="cursor-pointer">
            @if($vehicle->hasUser())
                <img   src="{{ asset('/images/icons/favorite_yes.png') }}">
            @else
                <img   src="{{ asset('/images/icons/favorite_no.png') }}">
            @endif
        </a>
    @else
        <button class="btn  waves-effect waves-light" title="{{ __('Log in') }}">
            <a href="{{ route('login') }}">
                <img   src="{{ asset('/images/icons/favorite_no.png') }}">
            </a>
        </button>
    @endauth


</div>
