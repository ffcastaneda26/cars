<div>
    @if($vehicles->count())
        <div>
            {{ $vehicles->count() }}

        </div>
    @endif

    <div class="vehicles-list">


            @foreach ($vehicles as $vehicle)
                    {{-- <div class="card vehicle-card" style="width: 18rem;">
                        <div class="text-center mt-2" >
                            <img src="{{ asset('images/acertado.png') }}" class="marco-foto vehicle-card-image" alt="..." height="50px" width="50px">
                        </div>
                        <div class="card-body">
                                <div class="card-text text-left">
                                    <h5 class="card-title"> {{ $vehicle->make }} - {{ $vehicle->model_year }} - {{ $vehicle->model }}</h5>
                                </div>

                            <p class="card-text text-left">{{ $vehicle->body }}</p>
                            @if($vehicle->miles_from)
                                <p class="card-text text-left">{{number_format($vehicle->miles_from, 0, '.', ',') . ' ' . __('Miles')}} </p>
                            @endif
                            @if($vehicle->price)
                                <div class="alinea-derecha">
                                    <h5>
                                        <strong>
                                            {{number_format($vehicle->price, 0, '.', ',') }}
                                        </strong>
                                    </h5>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                    <div class="card h-100" style="width: 18rem;">
                        <!-- Carrusel de fotos del Vehiculo-->
                            @include('livewire.search.show-carrousel-images')

                        {{-- Ícono Favoritos --}}
                            @include('livewire.search.show-vehicles-favorite')

                        <div class="card-body">
                            <h5 class="card-title">{{ $vehicle->make }} - {{ $vehicle->model_year }} - {{ $vehicle->model }}</h5>


                            <h6 class="card-subtitle mb-2 text-muted">
                                @if($vehicle->body)
                                    {{ $vehicle->body }}
                                @endif
                            </h6>
                            @if($vehicle->miles_from)
                            <p class="card-text">{{number_format($vehicle->miles_from, 0, '.', ',') . ' ' . __('Miles')}} </p>
                            @endif

                            <div class="vehicle-etiquetas">
                                <ul class="list-group list-group-flush">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-bg-warning p-1">Sin Licencia</li>
                                        <li class="list-group-item p-1">No necesitas Credito</li>
                                        <li class="list-group-item p-1">Financiamos con ITIN</li>
                                        <li class="list-group-item p-1">Sin Seguro </li>
                                        <li class="list-group-item p-1">Aceptamos Pasaporte</li>
                                    </ul>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <p class="vehicle-alignleft"><a href="#" class="btn btn-dark"><b>{{ __('More Information') }}</b></a></p>
                            <p class="vehicle-precio">{{number_format($vehicle->price, 0, '.', ',') }}</p>
                        </div>
                    </div>
            @endforeach

    </div>
</div>
