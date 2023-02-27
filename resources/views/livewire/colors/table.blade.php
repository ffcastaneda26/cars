<thead>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('spanish')">
            @if($sort == 'spanish')
                @if($direction == 'asc')
                    <span><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
            {{__("Spanish")}}
        </th>

        <th class="flex orderby"
            wire:click="order('english')">
            @if($sort == 'english')
                @if($direction == 'asc')
                    <span><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt"></i>
                @endif
            @else
                <i class="fas fa-sort"></i>
            @endif
            {{__("English")}}
        </th>


        <th colspan="2" class="text-center">{{__("Actions")}}</th>
    </tr>
</thead>
