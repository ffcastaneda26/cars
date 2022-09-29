<div class="col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-5 xl:col-span-2 mb-4">
    <div class="row align-items-between">
        {{-- Membresía --}}
        <div class="col-md-4 align-items-between">
            <label class="col-md-3 h5">
                {{__('Promotion')}}
            </label>

            <div class="col-lg-6">
                <select class="form-select h5"
                        wire:model="promotion_id"
                        wire:change="readPromotion()">
                    <option  value="">
                        {{__('Promotion')}}
                    </option>
                    @foreach($promotions as $promotion_select)
                        <option class="block mt-0 text-sm leading-tight font-serif text-gray-900 hover:underline"
                            value="{{$promotion_select->id}}">
                            @if(App::isLocale('en'))
                                {{$promotion_select->english}}
                            @else
                                {{$promotion_select->spanish}}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Nombre del Paquete --}}
        @if($promotion_id)
            <div class="col-md-4">
                <label class="col-md-3 h5">
                    {{__('Question')}}
                </label>
                @include('common.crud_search')
            </div>
        @endif
    </div>
</div>
