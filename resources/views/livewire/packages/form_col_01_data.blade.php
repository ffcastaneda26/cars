<div class="w-auto col flex flex-col flex-wrap">
    <form>
        {{-- Acceso a usuarios interesados --}}

        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="max_show_vehicles_per_location" class="btn-check" name="max_show_vehicles_per_location" id="max_show_vehicles_per_location_yes" value="1">
                <label class="btn btn-outline-success" for="max_show_vehicles_per_location_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="max_show_vehicles_per_location" class="btn-check ml-4" name="max_show_vehicles_per_location" id="max_show_vehicles_per_location_no" value="0">
                <label class="btn btn-outline-danger" for="max_show_vehicles_per_location_no">{{__('No')}}</label>
            </div>
        </div>
        {{-- Máximo de teléfonos por sucursal --}}
        <div class="flex-flex-column mb-2">
            <input type="number"
                wire:model="main_record.phone_number_listing_per_location"
                size="2"
                max="10"
                min="1"
                size="4"
                class=" mb-2"
            >
        </div>
        {{-- Campaña Web Site --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="company_web_site_listing" class="btn-check" name="company_web_site_listing" id="company_web_site_listing_yes" value="1">
                <label class="btn btn-outline-success" for="company_web_site_listing_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="company_web_site_listing" class="btn-check ml-4" name="company_web_site_listing" id="company_web_site_listing_no" value="0">
                <label class="btn btn-outline-danger" for="company_web_site_listing_no">{{__('No')}}</label>
            </div>
        </div>
        {{-- Sucursales Permitidas --}}
        <div class="flex-flex-column mb-2">

            <input type="number"
                wire:model="main_record.locations_allowed"
                size="2"
                max="10"
                min="1"
                size="4"
                class=" mb-2"
            >
        </div>
        {{-- Subir fotos por si mismo --}}

        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="self_service_photo_upload" class="btn-check" name="self_service_photo_upload" id="self_service_photo_upload_yes" value="1">
                <label class="btn btn-outline-success" for="self_service_photo_upload_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="self_service_photo_upload" class="btn-check ml-4" name="self_service_photo_upload" id="self_service_photo_upload_no" value="0">
                <label class="btn btn-outline-danger" for="self_service_photo_upload_no">{{__('No')}}</label>
            </div>
        </div>
        {{-- Sube fotos equipo cuervo --}}
        <div class="flex-flex-column mb-2">
            <select wire:model="main_record.team_cuervo_photo_upload"
                    class="w-10 mb-2">
                    <option value="Bimontly">{{__("Bimontly")}}</option>
                    <option value="Monthly">{{__("Monthly")}}</option>
            </select>
        </div>

        {{-- Etiquetas sobresalientes --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="tag_higlights" class="btn-check" name="tag_higlights" id="tag_higlights_yes" value="1">
                <label class="btn btn-outline-success" for="tag_higlights_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="tag_higlights" class="btn-check ml-4" name="tag_higlights" id="tag_higlights_no" value="0">
                <label class="btn btn-outline-danger" for="tag_higlights_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Máximo de etiquetas --}}
        <div class="flex-flex-column mb-2">

            <input type="number"
                    wire:model="main_record.max_tags_higlights"
                    size="2"
                    max="10"
                    min="1"
                    size="4"
                    class=" mb-2"
            >
        </div>
        {{-- Etiquetas Premium --}}

        <div class="flex-flex-column mb-2">

            <input type="number"
                    wire:model="main_record.premium_tag_search"
                    size="2"
                    max="10"
                    min="1"
                    size="4"
                    class=" mb-2"
            >
        </div>
        {{-- Agregar a favoritos --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="add_to_favorites" class="btn-check" name="add_to_favorites" id="add_to_favorites_yes" value="1">
                <label class="btn btn-outline-success" for="add_to_favorites_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="add_to_favorites" class="btn-check ml-4" name="add_to_favorites" id="add_to_favorites_no" value="0">
                <label class="btn btn-outline-danger" for="add_to_favorites_no">{{__('No')}}</label>
            </div>
        </div>
        {{-- Notificar agregar favoritos --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="notify_add_to_favorites" class="btn-check" name="notify_add_to_favorites" id="notify_add_to_favorites_yes" value="1">
                <label class="btn btn-outline-success" for="notify_add_to_favorites_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="notify_add_to_favorites" class="btn-check ml-4" name="notify_add_to_favorites" id="notify_add_to_favorites_no" value="0">
                <label class="btn btn-outline-danger" for="notify_add_to_favorites_no">{{__('No')}}</label>
            </div>
        </div>

        {{-- Acceso a usuarios intersados --}}
        <div class="flex-flex-column mb-2">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" wire:model="access_interested_users" class="btn-check" name="access_interested_users" id="access_interested_users_yes" value="1">
                <label class="btn btn-outline-success" for="access_interested_users_yes">{{__('Yes')}}</label>

                <input type="radio" wire:model="access_interested_users" class="btn-check ml-4" name="access_interested_users" id="access_interested_users_no" value="0">
                <label class="btn btn-outline-danger" for="access_interested_users_no">{{__('No')}}</label>
            </div>
        </div>


    </form>

</div>
