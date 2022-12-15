
<div class="container-fluid">
    @include('common.crud_header')

    <div class="d-flex flex-row align-items-start col-md-8 gap-2 mb-2">
        {{--  Vista búsquedas  --}}
        @if(isset($view_search))
            <div><label for="" class="form-control">{{ __('Search') }}</label></div>
            @include($view_search)
        @endif
    </div>

  {{-- Detalle de registros --}}

    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap">
                @foreach ($records as $record )
                    <div class="card" style="width: 18rem;">
                        <div class="text-center" >
                                @if($record->total_photos())
                                    <img src="{{ asset('images/' . $record->photos->first()->path) }}" class="marco-foto" alt="..." height="150px" width="150px">
                                @else
                                    <img src="{{ asset('images/acertado.png') }}" class="marco-foto" alt="..." height="150px" width="150px">
                                @endif
                        </div>
                        <div class="card-body">
                                <div class="text-center">
                                    <h5 class="card-title">{{ $record->model_year .' ' . $record->make }}</h5>
                                </div>
                            <p class="card-text">{{ $record->model }}</p>
                            <p class="card-text">{{ $record->body }}</p>
                            <p class="card-text">{{number_format($record->miles, 0, '.', ',') .' ' . __('Miles')}}</p>
                            <div class="alinea-derecha">
                                <h5>
                                    <strong>
                                        @if(number_format($record->price))
                                            $ {{number_format($record->price, 2, '.', ',') }}
                                        @endif
                                    </strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

</div>
