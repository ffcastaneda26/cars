<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-auto" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        
                        <div class="md:w-1/2 px-2 ">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Dealers")}}</label>
                            <select wire:model="dealer_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Dealer")}}</option>
                                @foreach($dealers as $dealer)
                                    <option value="{{$dealer->id}}">
                                        {!! $dealer->name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('dealer_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Make")}}</label>
                            <select wire:model="make_id" wire:change='read_model()' class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Make")}}</option>
                                @foreach($makes as $make)
                                    <option value="{{$make->id}}">
                                        {!! $make->name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('make_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Model")}}</label>
                            <select wire:model="modell_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Model")}}</option>
                                @if ($models)
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">
                                            {!! $model->name !!}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('modell_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Status")}}</label>
                            <select wire:model="status_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Status")}}</option>
                                @foreach($statuses as $status)
                                    <option value="{{$status->id}}">
                                        @if(App::isLocale('es'))
                                            {!! $status->spanish !!}
                                        @else
                                            {!! $status->english !!}                                    
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('status_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Styles")}}</label>
                            <select wire:model="style_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Style")}}</option>
                                @foreach($styles as $style)
                                    <option value="{{$style->id}}">
                                        {!! $style->name !!} 
                                    </option>
                                @endforeach
                            </select>
                            @error('style_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Color Exterior")}}</label>
                            <select wire:model="color_exterior_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Color Exterior")}}</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">
                                        @if(App::isLocale('es'))
                                            {!! $color->spanish !!}
                                        @else
                                            {!! $color->english !!}                                  
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('color_exterior_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Color Interior")}}</label>
                            <select wire:model="color_interior_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Color Interior")}}</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">
                                        @if(App::isLocale('es'))
                                            {!! $color->spanish !!}
                                        @else
                                            {!! $color->english !!}                                  
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('color_interior_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Transmissions  --}}
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Transmissions")}}</label>
                            <select wire:model="transmission_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Transmissions")}}</option>
                                @foreach($transmissions as $transmission)
                                    <option value="{{$transmission->id}}">
                                        @if(App::isLocale('es'))
                                            {!! $transmission->spanish !!}
                                        @else
                                            {!! $transmission->english !!}                                  
                                        @endif  
                                    </option>
                                @endforeach
                            </select>
                            @error('transmission_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Drivetrain  --}}
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Drivetrain")}}</label>
                            <select wire:model="drivetrain_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Drivetrain")}}</option>
                                @foreach($drivetrains as $drivetrain)
                                    <option value="{{$drivetrain->id}}">
                                        {!! $drivetrain->name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('drivetrain_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Trim  --}}
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Trim")}}</label>
                            <select wire:model="trim_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Trim")}}</option>
                                @foreach($trims as $trim)
                                    <option value="{{$trim->id}}">
                                        {!! $trim->name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('trim_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Fuel  --}}
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Fuel")}}</label>
                            <select wire:model="fuel_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option>{{__("Select Fuel")}}</option>
                                @foreach($fuels as $fuel)
                                    <option value="{{$fuel->id}}">
                                        {!! $fuel->name !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('fuel_id') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Description  --}}
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Description")}}</label>
                            <input type="text" wire:model="description" maxlength="100" placeholder="{{__("Description")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Price  --}}
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Price")}}</label>
                            <input type="number" wire:model="price" min="0" placeholder="{{__("Price")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Miles  --}}
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Miles")}}</label>
                            <input type="number" wire:model="miles" min="0" placeholder="{{__("Miles")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('miles') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Inventory  --}}
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Inventory")}}</label>
                            <input type="number" wire:model="inventory" min="0" placeholder="{{__("Inventory")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('inventory') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Number Vin  --}}
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Number Vin")}}</label>
                            <input type="text" wire:model="vin" minlength="0" maxlength="17" placeholder="{{__("Number Vin")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('vin') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        {{--  Checkboxs  --}}
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="available" class="absolute">
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Available")}}
                        </label>
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="show" class="absolute">
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Show")}}
                        </label>
                       
                    </div>
                   
                </div>
                @include('common.crud_save_cancel')
            </form>
        </div>
    </div>
</div>