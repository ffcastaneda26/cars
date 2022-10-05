<div id="layout-wrapper" style="background-image: url('assets/images/fondo.png');background-size:content; background-repet:no-repeat">
    <div class="account-pages">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="card text-uppercase">
                            <div class="card-body" style="border: dashed; margin:12px">
                                {{--  @if ($coupon && $coupon->gift->id)
                                    @foreach ($coupon->gift->files as $file)
                                        <img width="80%" src="{{ $file->file_path }}" alt="Gift">
                                    @endforeach
                                @endif  --}}
                                <div class="mx-auto justify-content-center" style="text-align: center;">
                                    @if ($coupon->gift->id == 1)
                                        <img width="100%" src="{{ asset('assets/images/kidscoupon.png') }}" alt="Gift">
                                    @else
                                        <img width="100%" src="{{ asset('assets/images/cupon.png') }}" alt="Gift">
                                    @endif
                                </div>
                                {{-- <div> --}}
                                    <h1 class="fs-1 text-center bg-dark text-white mt-2 text-uppercase">
                                       {{__('EXPIRES')}}: {{ date("M-d-Y", strtotime($coupon->expire_at)) }}
                                    </h1>
                                {{-- </div> --}}
                                <div>
                                    {{ $coupon->gift->legal_legend }}
                                </div>
                                <div>
                                    <h1 class="fs-1 text-center bg-dark text-white mt-2">
                                        {{$coupon->customer->FullName}}
                                    </h1>
                                </div>
                                <div>
                                    <h1 class="text-center bg-dark text-white">
                                        COUPON CODE: {{ $coupon->code }}
                                    </h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 mt-4">
                        <button wire:click="$toggle('show_coupon')"
                                class="mt-4 text-center btn btn-lg btn-info text-dark">
                            {{__('Exit')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
