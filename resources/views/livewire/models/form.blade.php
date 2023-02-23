<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Make")}}</label>
            <label class="input-group-text mb-2">{{__("Name")}}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Marca --}}
            <div class="flex-flex-column">
                <select wire:model="main_record.make_id"  class="block w-full bg-white border border-white-200 text-gray-700 py-2 px-4 pr-8 mb-3 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option>{{__("Make")}}</option>
                    @foreach($makesList as $make)
                        <option value="{{$make->id}}">
                            {!! $make->name !!}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="main_record.name" required placeholder="{{__("Model")}}"
                class="form-control mb-2"
                maxlength="50">
            </div>


        </div>
    </div>
</div>
