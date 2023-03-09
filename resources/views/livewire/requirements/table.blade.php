<thead>
    <tr class="bg-dark text-white">
        {{--  Nombre  --}}
        <th class="flex orderby mr-2"
            wire:click="order('name')">{{__('Name')}}
            @if($sort == 'name')
                @if($direction == 'asc')
                    <span class="float-left"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left"></i>
                @endif
            @else
                <i class="fas fa-sort float-left"></i>
            @endif

        </th>

        {{--  Telefono  --}}
        <th class="flex orderby"
            wire:click="order('phone')">{{__("Phone")}}
            @if($sort == 'phone')
                @if($direction == 'asc')
                    <span class="float-left"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left"></i>
                @endif
            @else
                <i class="fas fa-sort float-left"></i>
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

        {{--  Financiamiento  --}}
        <th class="flex orderby"
            wire:click="order('type_financing')">{{__("Financing")}}
            @if($sort == 'type_financing')
                @if($direction == 'asc')
                    <span class="float-left mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left  mr-2"></i>
                @endif
            @else
                <i class="fas fa-sort float-left  mr-2"></i>
            @endif
        </th>

        {{--  Enganche  --}}
        <th class="flex orderby"
            wire:click="order('downpayment')">{{__("Downpayment")}}
            @if($sort == 'downpayment')
                @if($direction == 'asc')
                    <span class="float-left mr-2"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-left  mr-2"></i>
                @endif
            @else
                <i class="fas fa-sort float-left  mr-2"></i>
            @endif
        </th>


        <th colspan="2" class="text-center">{{__("Actions")}}</th>
    </tr>
</thead>

