<div class="w-auto flex flex-col">
    <label class="input-group-text mb-2">{{__('Body Type') }} </label>
    <label class="input-group-text mb-2">{{__('Interior') }} </label>
    <label class="input-group-text mb-2">{{__('Exterior') }} </label>
    <label class="input-group-text mb-2">{{__('VIN') }} </label>
    @if($vehicle->transmission)
        <label class="input-group-text mb-2">{{__('Transmission') }} </label>
    @endif

    @if($vehicle->engine_model)
        <label class="input-group-text mb-2">{{__('Engine Model') }} </label>
    @endif


    @if($vehicle->fuel_type_primary)
        <label class="input-group-text mb-2">{{__('Primary Fuel') }} </label>
    @endif



</div>
