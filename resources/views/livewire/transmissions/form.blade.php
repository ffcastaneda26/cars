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
                    <div class="mb-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("English")}}</label>
                        <input type="text" wire:model="english" minlength="3" maxlength="200" placeholder="{{__("English")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                        @error('english') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Spanish")}}</label>
                        <input type="text" wire:model="spanish" minlength="3" maxlength="200" placeholder="{{__("Spanish")}}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
                        @error('spanish') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
                @include('common.crud_save_cancel')
            </form>
        </div>
    </div>
</div>