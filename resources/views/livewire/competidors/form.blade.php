<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("First Name")}}</label>
            <label class="input-group-text mb-2">{{__("Last Name")}}</label>
            <label class="input-group-text mb-2">{{__("Email")}}</label>
            <label class="input-group-text mb-2">{{__("Phone")}}</label>
        </div>

        <div class="col flex flex-col">
            {{-- Nombre --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.first_name"
                        required
                        placeholder="{{__("First Name")}}"
                        maxlength="40"
                        class="form-control mb-2"
                >
            </div>

            {{-- Apellido --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.last_name"
                        required
                        placeholder="{{__("Last Name")}}"
                        maxlength="40"
                        class="form-control mb-2"
                >
           </div>

            {{-- Correo --}}
            <div class="flex-flex-column">
                <input type="email"
                        wire:model="main_record.email"
                        maxlength="100"
                        placeholder="{{__("Email")}}"
                        class="form-control mb-2"
                >
            </div>

            {{-- Teléfono --}}
            <div class="flex-flex-column">
                <input type="text"
                        wire:model="main_record.phone"
                        maxlength="10"
                        placeholder="{{__("Phone")}}"
                        class="form-control mb-2"
                >
            </div>
           
 
        </div>
    </div>


    {{-- Acepta ser Mayor de Edad --}}
    <div class="row align-items-start">
        <label class="mt-2">{{__("I agree to be of legal age")}}
            <input type="checkbox"
                    wire:click="$toggle('agree_be_legal_age')"
                    class="checkbox"
            >
        </label>
    </div>

    
    {{-- Acepta Las Reglas --}}
    <div class="row align-items-start">
        <label class="mt-2">{{__("I have read and accept")}} 
            <a href="/" target="_blank">{{ __('The Rules')}}</a>
            <input type="checkbox"
                    wire:click="$toggle('agree_read_rules')"
                    class="checkbox"
            >
        </label>
    </div>

    @if(!$agree_be_legal_age || !$agree_read_rules)
        <div>
            <div class="card-body" style="border: dashed; margin:5px; border-color:red">
                    @if(!$agree_be_legal_age)
                        <p class="text-red">{{ __('Accept you are a legal Age')}}</p>
                    @endif
                    @if(!$agree_read_rules)
                        <p class="text-red">{{ __('Accept you have read the rules')}}</p>
                    @endif
            </div>
        </div>
    @endif



</div>
