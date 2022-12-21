<div>
    <a wire:click="add_to_my_favorites({{ $vehicle->id }})" class="cursor-pointer">
        @if($vehicle->hasUser())
            <img   src="{{ asset('/images/icons/favorite_yes.png') }}">
        @else
            <img   src="{{ asset('/images/icons/favorite_no.png') }}">
        @endif
    </a>



</div>
