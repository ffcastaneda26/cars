

        <div class="w-auto col flex flex-col">
            <form>
                {{-- Material Interior --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.material_id"
                            class="form-select mb-2
                            {{ $errors->has('main_record.material_id') ? 'field_error' : '' }}"
                        >
                        <option value="">{{__("Interiors")}}</option>
                        @foreach($materials as $material)
                                <option value="{{ $material->id }}" class="normal_option">
                                    {{ App::isLocale('en') ? $material->english : $material->spanish }}
                                </option>
                        @endforeach
                    </select>
                </div>

                {{-- Color Interior --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.interior_color_id"
                            class="form-select mb-2
                            {{ $errors->has('main_record.interior_color_id') ? 'field_error' : '' }}"
                        >
                        <option value="">{{__("Interior")}}</option>
                        @foreach($colors as $color_interior)
                                <option value="{{ $color_interior->id }}" class="normal_option">
                                    {{ App::isLocale('en') ? $color_interior->english : $color_interior->spanish }}
                                                                </option>
                        @endforeach
                    </select>
                </div>


                {{-- Color Exterior --}}
                <div class="flex-flex-column">
                    <select wire:model="main_record.exterior_color_id"
                        class="form-select mb-2
                        {{ $errors->has('main_record.exterior_color_id') ? 'field_error' : '' }}"
                    >
                        <option value="">{{__("Exterior")}}</option>
                        @foreach($colors as $color_exterior)
                               <option value="{{ $color_exterior->id }}" class="normal_option">
                                    {{ App::isLocale('en') ? $color_exterior->english : $color_exterior->spanish }}
                                </option>
                        @endforeach
                    </select>
                </div>

                {{-- Precio --}}
                    <input type="text"
                        wire:model="main_record.price"
                        class="mb-2
                        {{ $errors->has('main_record.price') ? 'field_error' : '' }}"
                        maxlength="7"
                        size="7"
                    >
                    @error('main_record.price')<span class="error_box">{{ $message }}</span>@enderror

                {{-- Millas --}}

                <div class="flex-flex-column mb-2">
                    <input type="text"
                        wire:model="main_record.miles"
                        class="mb-2
                        {{ $errors->has('main_record.miles') ? 'field_error' : '' }}"
                        maxlength="7"
                        size="7"
                    >
                    @error('main_record.miles')<span class="error_box">{{ $message }}</span>@enderror
                </div>

                {{-- Disponible --}}
                <div class="flex-flex-column mb-3">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="available" class="btn-check" name="available" id="available_yes" value="1">
                        <label class="btn btn-outline-success" for="available_yes">{{__('Yes')}}</label>

                        <input type="radio" wire:model="available" class="btn-check ml-4" name="available" id="available_no" value="0">
                        <label class="btn btn-outline-danger" for="available_no">{{__('No')}}</label>
                    </div>
                </div>

                {{-- Mostrar --}}
                <div class="flex-flex-column mb-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" wire:model="show" class="btn-check" name="show" id="show_yes" value="1">
                        <label class="btn btn-outline-success" for="show_yes">{{__('Yes')}}</label>

                        <input type="radio" wire:model="show" class="btn-check ml-4" name="show" id="show_no" value="0">
                        <label class="btn btn-outline-danger" for="show_no">{{__('No')}}</label>
                    </div>
                </div>

                {{-- Destacado --}}
                @if($max_premium_allowed)
                    <div class="flex-flex-column">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" 
                                    wire:model="premium" 
                                    class="btn-check" 
                                    name="premium" 
                                    id="premium_yes" 
                                    value="1"
                                    @disabled(!$allow_change_premium)

                            >
                            <label class="btn btn-outline-success" for="premium_yes">{{__('Yes')}}</label>

                            <input type="radio" 
                                    wire:model="premium" 
                                    class="btn-check ml-4" 
                                    name="premium" 
                                    id="premium_no" 
                                    value="0"
                            >
                            <label class="btn btn-outline-danger" for="premium_no">{{__('No')}}</label>
                        </div>
                    </div>
                @endif

            </div>


            </form>
        </div>
