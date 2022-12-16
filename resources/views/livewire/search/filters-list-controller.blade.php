<div>
    <div class="container">
         <div class="text-center"><h4>FILTROS DE LISTAS NETA DEL PLANETA</h4></div>
        <div class="row">
            <div class="flex flex-col">
                <button wire:click="sendFiltersList('click','12345')">Haz Clic Aquí</button>
            </div>
        </div>
         <div class="row text-center">
            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Make') }}</label>
                <select wire:model="make"
                        wire:change="sendFiltersList('make',$event.target.value)"
                        class="form-select">
                        <option value="null">{{__("Make")}}</option>
                        @for($i=0;$i<=5;$i++)
                            <option value="{{ $i }}">{{ 'Marca' .' ' . $i }}</option>
                        @endfor
                </select>
            </div>

            <div class="flex flex-col mb-2">
                <label class="input-group-text mb-2">{{ __('Model') }}</label>
                <select wire:model=""
                        class="form-select">
                        <option value="">{{__("Model")}}</option>
                        @for($i=0;$i<=5;$i++)
                            <option value="{{ $i }}">{{ 'Model' .' ' . $i }}</option>
                        @endfor
                </select>
            </div>


            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Body') }}</label>
                <select wire:model=""
                        class="form-select">
                        <option value="">{{__("Body")}}</option>
                        @for($i=0;$i<=5;$i++)
                            <option value="{{ $i }}">{{ 'Body' .' ' . $i }}</option>
                        @endfor
                </select>
            </div>


            <div class="flex flex-col">
                <label class="input-group-text mb-2">{{ __('Color') }}</label>
                <select wire:model=""
                        class="form-select">
                        <option value="">{{__("Color")}}</option>
                        @for($i=0;$i<=5;$i++)
                            <option value="{{ $i }}">{{ 'Color' .' ' . $i }}</option>
                        @endfor
                </select>
            </div>
         </div>
    </div>
 </div>
