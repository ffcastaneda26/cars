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
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Name")}}</label>
                        <input type="text" wire:model="name" onkeypress="return validate_string(event, this)" maxlength="50"  placeholder="{{__("Name")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Email")}}</label>
                        <input type="text" wire:model="email" maxlength="50"  placeholder="{{__("Email")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Phone")}}</label>
                        <input type="text" wire:model="phone"  maxlength="10" minlength="7"  placeholder="{{__("Phone")}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Password")}}</label>
                        <input type="password" wire:model="password"  maxlength="50"  placeholder="{{__("Password")}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Confirm Password")}}</label>
                        <input type="password" wire:model="password_confirmation"  maxlength="50"  placeholder="{{__("Confirm Password")}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('password_confirmation') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Role")}}</label>
                    <select wire:model="role_id" class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option>{{__("Select Role")}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">
                                @if(App::isLocale('en'))
                                    {{ $role->english_description }}
                                @else
                                    {{ $role->spanish_description }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('role_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    <div class="mb-4">
                        <label class="flex text-gray-700 justify-start font-semibold items-start mr-2 mt-4">
                            <div class="bg-white border-2 rounded border-gray-400 w-5 h-5 flex flex-shrink-0 justify-center items-center mr-2 focus-within:border-blue-500">
                            <input type="checkbox" wire:model="active" checked>
                            <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                            </div>
                            {{__("Active")}}
                        </label>
                    </div>
                </div>
                @include('common.crud_save_cancel')
            </form>
        </div>
    </div>
</div>
