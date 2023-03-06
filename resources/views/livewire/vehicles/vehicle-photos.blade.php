
<div class="container">

    <h1 class="bg-info text-center">
        {{ $vehicle->model_year }}
        {{ $vehicle->make->name }}
        {{ $vehicle->model->name }}
        {{ $vehicle->style->name }}
    </h1>

    <div class="galeria">

        @foreach ($vehicle->photos as $photo )

                <div class="card">
                    <div class="text-center">
                        @if(!str_contains($photo->path,'storage'))
                            <img src="{{ asset('images/vehicles/photos/' .  $photo->path) }}"
                            class="marco-foto" alt="{{$photo->path}}" height="75px" width="75px">
                        @else

                            <img src="{{ asset( $photo->path) }}" class="marco-foto" alt="..." height="75px" width="75px">

                        @endif

                    </div>
                    <div class="text-center mt-2">
                        <form method="post" action="{{url('admin/vehicles/photos/delete')}}" >
                            <input type="hidden" name="photo" value="{{ $photo->id }}" id="photo">
                            @csrf
                            <button type="submit" class="btn bg-danger">{{ __('Delete') }}</button>
                        </form>
                    </div>
                </div>

        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex justify-content-end">
                    {{-- Botón para regresar a vehículos --}}
                    <div>
                        <a href="{{route('vehicles')}}">
                            <button class="mt-2 mr-2 btn bg-warning">{{ __('RETURN TO VEHICLES LIST') }}</button>
                        </a>
                    </div>
                </div>

                    <div class="card-body">
                        <input type="file"
                                wire:model="photos"
                                class="form-control mb-2"
                                multiple
                        >
                        @error('photos.*')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        @if ($photos)
                            <h3>{{__('Images')}}</h3>
                            @foreach ($photos as $photo)
                                <img src="{{$photo->temporaryUrl()}}" height="100px" width="100px">
                            @endforeach
                        @endif



                    </div>
                    <div class="card-footer">

                        <button type="button"
                                wire:click="store"
                                class="btn btn-primary">
                            {{__("Save") }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






</html>

