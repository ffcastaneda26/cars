<div id="photo-{{$vehicle->id }}" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
        @foreach ( $vehicle->photos as $photo )
    <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
        <img src="{{ asset('images/vehicles/photos/' .  $photo->path) }}" class="d-block w-100 h-100" alt="No Carga Foto" >
    </div>
    @endforeach

</div>
<button class="carousel-control-prev" type="button" data-bs-target="#photo-{{$vehicle->id }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#photo-{{$vehicle->id }}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
</div>
