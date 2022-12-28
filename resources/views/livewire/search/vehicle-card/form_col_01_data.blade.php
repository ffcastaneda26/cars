<div class="w-auto col flex flex-col flex-wrap">
    <label class="input-group-text mb-2">{{$vehicle->body}}</label>
    <label class="input-group-text mb-2">
        {{ App::isLocale('en') ? $vehicle->interior_color->english : $vehicle->interior_color->spanish}}
    </label>
    <label class="input-group-text mb-2">
        {{ App::isLocale('en') ? $vehicle->exterior_color->english : $vehicle->interior_color->spanish}}
    </label>

    <label class="input-group-text mb-2">{{ $vehicle->vin }} </label>
    @if($vehicle->transmission)
        <label class="input-group-text mb-2">{{ $vehicle->transmission }} </label>
    @endif

    @if($vehicle->engine_model)
        <label class="input-group-text mb-2">{{ $vehicle->engine_model }}</label>
    @endif

    @if($vehicle->fuel_type_primary)
        <label class="input-group-text mb-2">{{ $vehicle->fuel_type_primary }}</label>
    @endif

</div>
