<div class="row">
   <div class="d-flex justify-content-between">
        <div class="d-flex">
            {{-- Nombre --}}
            <div class="p-2">
                <label class="input-group-text">
                    {{ __('Name') }}
                </label>
            </div>

            <div class="p-2 w-75">
                <input type="text"
                    wire:model="main_record.name"
                    maxlength="100"
                    placeholder="{{__("Package Name")}}"
                    class="form-control mb-2"
                >
            </div>

            {{-- Precio --}}
            <div class="p-2 ml-10">
                <label class="input-group-text mb-2">
                    {{ __('Price') }}
                </label>
            </div>


            <div class="p-2">
                <input type="text"
                    wire:model="main_record.price"
                    maxlength="5"
                    pattern="[0-9]"
                    placeholder="{{__("Price")}}"
                    class="form-control mb-2"
                >
            </div>

        </div>


        <div class="d-flex justify-content-end">
            @if (count($errors) > 0)
                <div class="d-flex error_box font-bold">
                    {{ __('Check all values') }}
                </div>
            @endif

            @include('common.crud_save_cancel')
        </div>
    </div>
</div>

