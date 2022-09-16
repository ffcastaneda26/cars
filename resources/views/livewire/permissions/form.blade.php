
<div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myModal" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModal">{{__("Permission")}}</h5>
                <button type="button" class="btn-close" wire:click.prevent="closeModal()"
                data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                {{-- Nombre --}}

                <div class="input-group mb-3 grid-cols-2 gap-2">
                    <span class="input-group-text">{{__("Name")}}</span>
                    <input type="text" wire:model="name" required placeholder="{{__("Name")}}"
                    class="form-control">
                    @error('name') <div class="text-danger">{{ $message }}</div>@enderror
                </div>

                {{-- Slug --}}
                <div class="input-group mb-3 grid-cols-2 gap-2">
                    <span class="input-group-text">{{__("Slug")}}</span>
                    <input type="text" wire:model="slug" required placeholder="{{__("Name")}}"
                    class="form-control">
                    @error('slug') <div class="text-danger">{{ $message }}</div>@enderror
                </div>

                {{-- Inglés --}}
                <div class="input-group mb-3 grid-cols-2 gap-2">
                    <span class="input-group-text">{{__("English")}}</span>
                    <textarea wire:model="english"  class="form-control" cols="30" rows="3" ></textarea>

                    @error('english') <div class="text-danger">{{ $message }}</div>@enderror
                </div>

                {{-- Español --}}
                <div class="input-group mb-3 grid-cols-2 gap-2">
                    <span class="input-group-text">{{__("Spanish")}}</span>
                    <textarea wire:model="spanish"  class="form-control" cols="30" rows="3" ></textarea>

                    @error('spanish') <div class="text-danger">{{ $message }}</div>@enderror
                </div>


            </div>

            <div class="modal-footer">
                @include('common.crud_save_cancel')
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="bg-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>

    <div class="row align-items-start">
      <div class="col-md-4 flex flex-col">
        <label class="input-group-text mb-2">{{__("Name")}}</label>
        <label class="input-group-text mb-2">{{__("Slug")}}</label>
        <label class="input-group-text mb-2">{{__("English")}}</label>
        <label class="input-group-text mb-2">{{__("Spanish")}}</label>
      </div>


        <div class="col flex flex-col">

        {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="name"
                        required
                        placeholder="{{__('Permission')}}"
                        class="form-control mb-2"
                        maxlength="100"
                >

            </div>

            {{-- English --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="english" required placeholder="{{__("English")}}"
                    class="form-control mb-2">
                </div>

            {{-- Español --}}
            <div class="flex-flex-column">
                <input type="text" wire:model="spanish" required placeholder="{{__("Spanish")}}"
                class="form-control mb-2">
            </div>

            {{-- Acceso Total --}}
            <div class="flex-flex-column">
                <input type="checkbox" wire:model="full_access"
                class="form-check-input">
            </div>

        </div>

    </div>
</div>
