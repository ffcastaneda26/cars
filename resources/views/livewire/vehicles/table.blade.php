<thead>
    <tr class="bg-dark text-white">


        {{--  Distribuidor  --}}
        <th class="flex orderby"
            wire:click="order('dealer_id')">{{__("Dealer")}}
            @if($sort == 'dealer_id')
                @if($direction == 'asc')
                    <span class="float-left mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left"></i>
                @endif
            @else
                <i class="fas fa-sort float-left mr-2"></i>
            @endif
        </th>


        {{--  Axo  --}}

        <th class="flex orderby"
            wire:click="order('model_year')">{{__("Year")}}
            @if($sort == 'model_year')
                @if($direction == 'asc')
                    <span class="float-left mr-2 "><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left  mr-2"></i>
                @endif
            @else
                <i class="fas fa-sort float-left  mr-2"></i>
            @endif
        </th>

        {{--  Marca  --}}
        <th class="flex orderby"
            wire:click="order('make_id')">{{__("Make")}}
            @if($sort == 'make_id')
                @if($direction == 'asc')
                    <span class="float-left mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left"></i>
                @endif
            @else
                <i class="fas fa-sort float-left mr-2"></i>
            @endif
        </th>

        {{--  Modelo  --}}
        <th class="flex orderby"
            wire:click="order('model_id')">{{__("Model")}}
            @if($sort == 'model_id')
                @if($direction == 'asc')
                    <span class="float-left mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left  mr-2"></i>
                @endif
            @else
                <i class="fas fa-sort float-left  mr-2"></i>
            @endif
        </th>

        {{--  Estilo  --}}

        <th class="flex orderby"
            wire:click="order('style_id')">{{__("Style")}}
            @if($sort == 'style_id')
                @if($direction == 'asc')
                    <span class="float-left  mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left  mr-2"></i>
                @endif
            @else
                <i class="fas fa-sort float-left  mr-2"></i>
            @endif
        </th>


        <th class="text-center">{{__("Stock")}}</th>

        <th colspan="3" class="px-4 py-1 text-center">{{__("Actions")}}</th>
    </tr>
</thead>

