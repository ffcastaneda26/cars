<div>
    <div>
        @if ($filters_list)
            {{  $filters_list }}
        @endif

        @if ($filters_text)
            {{  $filters_text }}
        @endif

    </div>
    <div class="vehicles-list">
        @for ($i=0;$i<=5;$i++)
                <div class="card vehicle-card" style="width: 18rem;">
                    <div class="text-center mt-2" >
                        <img src="{{ asset('images/acertado.png') }}" class="marco-foto vehicle-card-image" alt="..." height="50px" width="50px">
                    </div>
                    <div class="card-body">
                            <div class="card-text text-left">
                                <h5 class="card-title"> Marca - Año</h5>
                            </div>
                        <p class="card-text text-left">Modelo</p>
                        <p class="card-text text-left">Estilo</p>
                        <p class="card-text text-left">Millas</p>
                        <div class="alinea-derecha">
                            <h5>
                                <strong>
                                        $ 99,999
                                </strong>
                            </h5>
                        </div>
                    </div>
                </div>
        @endfor
    </div>
</div>
