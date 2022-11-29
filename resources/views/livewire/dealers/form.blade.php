<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-2 ">
                            <label class="block text-gray-700 text-sm font-bold">{{__("Name")}}</label>
                            <input type="text"
                                wire:model="main_record.name"
                                maxlength="150"
                                placeholder="{{__("Name")}}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">

                        <div class="w-full md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold">{{__("Address")}}</label>
                            <input type="text"
                                wire:model="main_record.address"
                                maxlength="60"
                                placeholder="{{__("Address")}}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    {{-- Zona Postal - Ciudad y Estado --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2 mr-2 ">{{__("Zipcode")}}</label>
                            <input type="text"
                            wire:model="main_record.zipcode"
                            wire:change="read_zipcode()"
                            maxlength="5"
                            placeholder="{{__("Zipcode")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('zipcode') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="md:w-1/2 px-2">
                            <label wire:model="town_state"
                            class="block text-gray-700 text-sm font-bold mb-2">{{__("Town:")}}
                            </label>
                            <label class="block text-gray-700 text-2xl font-serif">{{$town_state}}</label>
                        </div>
                    </div>

                    {{-- Correo y Celular --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Email")}}</label>
                            <input type="text"
                                wire:model="main_record.email" maxlength="60" placeholder="{{__("Email")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Phone/Celular")}}</label>
                            <input type="text"
                                    maxlength="15" wire:model="main_record.phone" placeholder="{{__("Phone")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    {{-- Sitio Web --}}
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full  bg-gray-200 h-15">
                            <label class="tracking-wide text-black text-xs font-bold">{{__("Website")}}</label>
                            <input type="text" maxlength="100" wire:model="main_record.website" placeholder="{{__("Website")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('website') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    {{-- Fecha Expira --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-1/2 ml-auto bg-gray-200 h-15">
                            <label class="tracking-wide text-black text-xs font-bold">{{__("Expire At")}}</label>
                            <input type="date" min=<?php $hoy=date("Y-m-d"); echo $hoy;?>
                            wire:model="expire_at"
                            class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                            @error('expire_at') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                         {{-- Activo? --}}
                        <div class="w-1/2 ml-auto bg-gray-200 h-15">
                            <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                                <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                                <input type="checkbox" wire:model="active" class="absolute">
                                <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </div>
                                {{__("Active")}}
                            </label>
                        </div>
                    </div>

                    {{-- Logotipo --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="mb-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Image")}}</label>
                            <input type="file" wire:model="image_path">
                            @error('image_path') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        @if ($main_record->image_path)
                            <div>
                                {{__('Preview:')}}
                                <img src="{{ asset('storage/dealers/' .$main_record->image_path) }}"  class="h-8 w-8 object-cover">
                            </div>
                        @endif
                        @if ($image_path)
                            <div>
                                {{__('Preview:')}}
                                <img src="{{ $image_path->temporaryUrl() }}" class="h-8 w-8 object-cover">
                            </div>
                        @endif
                    </div>


                    {{-- Latidud y Longitud --}}
                    {{-- <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="md:w-1/2 px-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2">{{__("Latitude")}}</label>
                            <input type="text" wire:model="main_record.latitude" maxlength="100" placeholder="{{__("Latitude")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('latitude') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="md:w-1/2 px-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Longitude")}}</label>
                            <input type="text"  maxlength="100" wire:model="main_record.longitude" placeholder="{{__("Longitude")}}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('longitude') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    {{-- Posición Mapa --}}
                    {{-- <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-1/2 ml-auto bg-gray-200 h-15">
                            <label class="tracking-wide text-black text-xs font-bold">{{__("Position")}}</label>
                            <input type="text"
                            wire:model="position"
                            class="shadow appearance-none border rounded w-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                            @error('position') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                    </div> --}}



                </div>
                @include('common.crud_save_cancel')
            </form>
        </div>
    </div>
</div>
