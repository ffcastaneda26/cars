<div id="photo-{{$vehicle->id }}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($vehicle->photos as $photo )
            <div class="carousel-item active">
                <img src="{{ asset('images/' .  $photo->path) }}" class="d-block w-100 photo-borders-superior">
            </div>
        @endforeach
    </div>
    @if($vehicle->photos->count())
        <button class="carousel-control-prev" type="button"
            data-bs-target="#photo-{{ $vehicle->id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>

        <button class="carousel-control-next" type="button"
            data-bs-target="#photo-{{ $vehicle->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    @endif
</div>
