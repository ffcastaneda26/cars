<thead>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('make')">{{__("Make")}}
            @if($sort == 'make')
                @if($direction == 'asc')
                    <span class="float-right"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                @endif
            @else
                <i class="fas fa-sort float-right"></i>
            @endif
        </th>

        <th>{{__("Model")}}</th>
        <th>{{__("Year")}}</th>
        <th>{{__("Type")}}</th>
        <th>{{__("Body")}}</th>
        <th>{{__("Trim")}}</th>

        <th>{{__("Miles")}}</th>
        <th class="text-center">{{__("Available")}}</th>
        <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
    </tr>
</thead>

