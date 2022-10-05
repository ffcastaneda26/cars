
 {{-- @include('livewire.coupon-controller-form') --}}
 <div>
    <div class="account-pages">
        <div class="row justify-content-center" style="background: rgb(170, 168, 168);">
            <div class="col-lg-4">
                {{-- Código de Cupón --}}
                <div class="card" style="margin-top:15%">
                    <div class="card-body">
                        <div class="p-2">
                            <h3 class="text-center">{{ __('Type Coupon Code') }}</h3>
                            <div class="mb-3">
                                <input type="text"
                                    wire:model="coupon_code"
                                    wire:keyup="read_coupon"
                                    required
                                    maxlength="6"
                                    size="2"
                                    pattern="[A-Z]{2}[0-9]{4}"
                                    class="form-control mb-2">
                            </div>

                        </div>
                    </div>
                </div>

                @if($message_coupon)
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2 text-danger">
                                <h2>{{ $message_coupon}}</h2>
                            </div>
                        </div>
                    </div>
                @endif

                @if($can_refund && $coupon_record)
                    <button  onclick="confirm_refund({{$coupon_record->id}})"
                        class="btn btn-success waves-effect waves-light w-auto"
                        title="{{__("Refund")}}">
                        {{__("Refund")}}
                    </button>
                @endif
            </div>

>
    </div>
    </div>
</div>

