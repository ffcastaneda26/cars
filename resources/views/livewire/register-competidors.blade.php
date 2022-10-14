<div>
Las variables siguientes son de tipo bool y dependiendo de la que esté verdadera es lo que hay que presentar
$can_continue = Se pone TRUE cuando el código sea verdadero
$read_competidor_data = Cuando esté encendida soliitar los datos del competidor en un formulario:
(a) Nombre
(b) Correo
(c) Teléfono
(*) Que acepta que es mayor de edad (No lo grabamos en base de datos)

$read_picks =  Mostrar formulario para leer el pronóstico de todos los partidos (ver: livewire.picks.create_picks.blade.php)
    
Me interesa ahorita los formularios 

<h1>{{__('Quiniela Mundialista')}}</h1>

           <div>
            <div class="account-pages">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        {{-- Código de Cupón --}}
                        <div class="card" style="margin-top:15%">
                            <div class="card-body">
                                <div class="p-2">
                                    <h3 class="text-center">{{ __('Type Coupon Code') }}</h3>
                                    <div class="row justify-content-center">
                                        <div class="mb-3 col-lg-3">
                                            <input type="text"
                                                required
                                                maxlength="8"
                                                pattern="[A-Z]{4}[0-9]{4}"
                                                class="form-control mb-2">
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                        </div>
        
                        @if($message_code)
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-2 text-danger">
                                        <h2>{{ $message_code}}</h2>
                                    </div>
                                </div>
                            </div>
                        @endif
        
                        @if($can_continue && $code)
                            <button wire:click="$set('read_competidor_data', true)" 
                                    class="btn btn-success waves-effect waves-light w-auto"
                                    title="{{__("Continue")}}">
                                {{__("Continue")}}
                            </button>
                        @endif
                    </div>
        
    
            </div>
            </div>
        </div>

</div>