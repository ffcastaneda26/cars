<div>
    {{-- <div>
       <h2> Vehiculos encontrados: {{ $vehicles->count() }} </h2>
       <h3>Filtros: </h3>
       <ul>
            <li>Año: {{  $model_year }}</li>
            <li>Marca: {{  $make }}</li>
            <li>Modelo: {{  $model }}</li>
            <li>Body: {{  $body }}</li>
            <li>Color: {{  $color_id }}</li>
       </ul>
    </div> --}}
    <div class="vehicles-list">

        @foreach ($vehicles as $vehicle)
            @livewire('vehicle-card',['vehicle' => $vehicle],key($vehicle->id))
        @endforeach

    </div>
</div>
