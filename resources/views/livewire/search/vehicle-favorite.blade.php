<div>
    @auth
        <a wire:click="add_to_my_favorites({{ $vehicle->id }})" class="cursor-pointer">
            @if($vehicle->hasUser())
                <img   src="{{ asset('/images/icons/favorite_yes.png') }}" height="35px">
            @else
                <img   src="{{ asset('/images/icons/favorite_no.png') }}" height="35px">
            @endif
        </a>
    @else
        <button class="btn  waves-effect waves-light" title="{{ __('Add To Favorites') }}">
            <a href="{{ url('vehicle-add-favorite') .'/' . $vehicle->id }}">
                <img   src="{{ asset('/images/icons/favorite_no.png') }} " height="35px">
            </a>
        </button>
    @endauth

</div>
@section('scripts')
    <script>
        window.addEventListener('refresh_page', event => {
            window.location.reload();
        })
    </script>

@endsection
