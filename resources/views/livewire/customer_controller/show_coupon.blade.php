<div id="layout-wrapper">
    <div class="account-pages" style="background-image: url('assets/images/bg_show_cupon.png');background-size:cover; background-repet:no-repeat">
        <div class="row justify-content-center">
            <div class="margen">
                <p></p>
            </div>
            <div class="card text-uppercase">
                <div class="card-body" style="border: dashed; margin:12px;">
                    {{--  @if ($coupon && $coupon->gift->id)
                        @foreach ($coupon->gift->files as $file)
                            <img width="80%" src="{{ $file->file_path }}" alt="Gift">
                        @endforeach
                    @endif  --}}
                    <div class="mx-auto justify-content-center" style="text-align: center;">
                        @if ($coupon->gift->id == 1)
                            <img src="{{ asset('assets/images/kidscoupon.png') }}" class="img-fluid" alt="Gift">
                        @else
                            <img src="{{ asset('assets/images/cupon.png') }}" class="img-fluid" alt="Gift">
                        @endif
                    </div>
                    {{-- <div> --}}
                        <h1 class="fs-3 text-center text-white mt-1 text-uppercase" style="background: black">
                            {{__('EXPIRES')}}: {{ date("M-d-Y", strtotime($coupon->expire_at)) }}
                        </h1>
                    {{-- </div> --}}
                    <div>
                        <p class="text-justify">{{ $coupon->gift->legal_legend }}</p>
                    </div>
                    <div>
                        <h2 class="fs-1 text-center text-white mt-2" style="background: black">
                            {{$coupon->customer->FullName}}
                        </h2>
                    </div>
                    <div>
                        <h2 class="fs-3 text-center text-white" style="background: black">
                            {{__('COUPON CODE')}}: {{ $coupon->code }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="mx-auto justify-content-center" style="text-align: center;">
                <img class="img-fluid" src="{{ asset('assets/images/moon.png') }}" alt="Gift">
            </div>
        </div>
    </div>
</div>