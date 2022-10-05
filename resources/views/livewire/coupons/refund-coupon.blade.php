
 {{-- @include('livewire.coupon-controller-form') --}}
 <div id="layout-wrapper">
    <div class="account-pages">
        <div class="row justify-content-center">
            <div style="margin-top:20%">
                <p></p>
            </div>
            <div class="col-lg-4">
                {{-- Código de Cupón --}}
                <div class="card">
                    <div class="card-body">
                        <div class="p-2">
                            <h4 class="text-center">{{ __('Type Coupon Code') }}</h4>
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

