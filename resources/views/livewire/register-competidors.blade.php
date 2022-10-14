<div>
    <h1>{{__('Quiniela Mundialista')}}</h1>
           <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 CLASS="card-title">{{__('Type Your Code')}}</h2>

                </div>
            </div>
           </div>

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