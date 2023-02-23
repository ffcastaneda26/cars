<thead>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('make_id')">
            @if($sort == 'make_id')
                @if($direction == 'asc')
                    <span><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
            {{__("Make")}}
        </th>

        <th class="flex orderby"
            wire:click="order('name')">
            @if($sort == 'name')
                @if($direction == 'asc')
                    <span><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
            {{__("Name")}}
        </th>


        <th colspan="2" class="text-center">{{__("Actions")}}</th>
    </tr>
</thead>
