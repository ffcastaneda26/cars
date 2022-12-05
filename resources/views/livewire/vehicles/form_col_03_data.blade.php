
        <div class="w-auto col flex flex-col">
            <form>
                {{-- Sucursal --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.location_id"
                             class="form-select mb-2">
                        <option value="">{{__("Location")}}</option>
                        @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>

                </div>


                {{-- Color Interior --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.location_id"
                            class="form-select mb-2">
                        <option value="">{{__("Location")}}</option>
                        @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>

                </div>


                {{-- Color Exterior --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.location_id"
                        class="form-select mb-2">
                        <option value="">{{__("Location")}}</option>
                        @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Precio --}}
                <div class="flex-flex-column">
                    <input type="text"
                    wire:model="main_record.price"
                    class="form-control mb-2"
                >

                {{-- Millas --}}

                <div class="flex-flex-column">
                    <input type="text"
                    wire:model="main_record.miles"
                    class="form-control mb-2"
                >

                {{-- Disponible --}}
                <div class="flex-flex-column mb-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="available" class="btn-check" name="available" id="available_yes" value="1">
                        <label class="btn btn-outline-success" for="available_yes">{{__('Yes')}}</label>

                        <input type="radio" wire:model="available" class="btn-check ml-4" name="available" id="available_no" value="0">
                        <label class="btn btn-outline-danger" for="available_no">{{__('No')}}</label>
                    </div>
                </div>

                {{-- Mostrar --}}
                <div class="flex-flex-column">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="show" class="btn-check" name="show" id="show_yes" value="1">
                        <label class="btn btn-outline-success" for="show_yes">{{__('Yes')}}</label>

                        <input type="radio" wire:model="show" class="btn-check ml-4" name="show" id="show_no" value="0">
                        <label class="btn btn-outline-danger" for="show_no">{{__('No')}}</label>
                    </div>
                </div>


            </div>


            </form>
        </div>
