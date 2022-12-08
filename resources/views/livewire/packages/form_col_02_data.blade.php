<div class="w-auto col flex flex-col flex-wrap">
    <form>



        {{-- Integración de inventario --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="inventory_integratgion" class="btn-check" name="inventory_integratgion" id="inventory_integratgion_yes" value="1">
                <label class="btn btn-outline-success" for="inventory_integratgion_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="inventory_integratgion" class="btn-check ml-4" name="inventory_integratgion" id="inventory_integratgion_no" value="0">
                <label class="btn btn-outline-danger" for="inventory_integratgion_no">{{__('No')}}</label>
            </div>
        </div>
        {{-- Precio x Sucursal Adicional --}}
        <div class="col-xs-2">
            <div class="flex-flex-column mb-2">

                <input type="text"
                    wire:model="main_record.price_additional_location"
                    maxlength="5"
                    pattern="[0-9]"
                    size="8"
                    placeholder="{{__("Price Additional Location")}}"
                    class="mb-2"
                >
            </div>

        </div>

        {{-- Bono de Listar mas Vehículos --}}
        <div class="flex-flex-column mb-2">
            <input type="number"
                wire:model="main_record.vehicle_listing_bonus"
                size="2"
                max="10"
                min="1"
                size="4"
                class=" mb-2"
            >
        </div>

        {{-- Máximo de Fotos por Vehículo --}}
        <div class="flex-flex-column mb-2">
            <input type="number"
                wire:model="main_record.max_photos_by_vehicle"
                size="2"
                max="10"
                min="1"
                size="4"
                class=" mb-2"
            >
        </div>

        {{-- Máxio de Fotos por Sucursal --}}
        <div class="flex-flex-column mb-2">
            <input type="number"
                wire:model="main_record.max_photos_by_location"
                size="2"
                max="10"
                min="1"
                size="4"
                class=" mb-2"
            >
        </div>

        {{-- Buscar por Tags --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="search_by_tags" class="btn-check" name="search_by_tags" id="search_by_tags_yes" value="1">
                <label class="btn btn-outline-success" for="search_by_tags_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="search_by_tags" class="btn-check ml-4" name="search_by_tags" id="search_by_tags_no" value="0">
                <label class="btn btn-outline-danger" for="search_by_tags_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Mostrar Precios en Resultados --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="show_prices" class="btn-check" name="show_prices" id="show_prices_yes" value="1">
                <label class="btn btn-outline-success" for="show_prices_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="show_prices" class="btn-check ml-4" name="show_prices" id="show_prices_no" value="0">
                <label class="btn btn-outline-danger" for="show_prices_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Mostrar Sucursales en Resultados --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="show_locations" class="btn-check" name="show_locations" id="show_locations_yes" value="1">
                <label class="btn btn-outline-success" for="show_locations_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="show_locations" class="btn-check ml-4" name="show_locations" id="show_locations_no" value="0">
                <label class="btn btn-outline-danger" for="show_locations_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Contar Clics en Vehículo --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="count_clicks_in_vehicle" class="btn-check" name="count_clicks_in_vehicle" id="count_clicks_in_vehicle_yes" value="1">
                <label class="btn btn-outline-success" for="count_clicks_in_vehicle_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="count_clicks_in_vehicle" class="btn-check ml-4" name="count_clicks_in_vehicle" id="count_clicks_in_vehicle_no" value="0">
                <label class="btn btn-outline-danger" for="count_clicks_in_vehicle_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Contar Tiempo Ver Vehículo --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="count_time_see_vehicle" class="btn-check" name="count_time_see_vehicle" id="count_time_see_vehicle_yes" value="1">
                <label class="btn btn-outline-success" for="count_time_see_vehicle_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="count_time_see_vehicle" class="btn-check ml-4" name="count_time_see_vehicle" id="count_time_see_vehicle_no" value="0">
                <label class="btn btn-outline-danger" for="count_time_see_vehicle_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Contar Fotos Vistas --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="count_photos_see" class="btn-check" name="count_photos_see" id="count_photos_see_yes" value="1">
                <label class="btn btn-outline-success" for="count_photos_see_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="count_photos_see" class="btn-check ml-4" name="count_photos_see" id="count_photos_see_no" value="0">
                <label class="btn btn-outline-danger" for="count_photos_see_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Usar Orden Para Buscar --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="use_order_to_search" class="btn-check" name="use_order_to_search" id="use_order_to_search_yes" value="1">
                <label class="btn btn-outline-success" for="use_order_to_search_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="use_order_to_search" class="btn-check ml-4" name="use_order_to_search" id="use_order_to_search_no" value="0">
                <label class="btn btn-outline-danger" for="use_order_to_search_no">{{__('No')}}</label>
            </div>
        </div>


    </form>
</div>
