<thead>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('spanish')">{{__("Spanish")}}
            @if($sort == 'spanish')
                @if($direction == 'asc')
                    <span class="float-right"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                @endif
            @else
                <i class="fas fa-sort float-right"></i>
            @endif
        </th>
        <th >{{__("Short")}}</th>
        <th scope ="col" class="orderby" wire:click="order('english')">{{__("English")}}
            @if($sort == 'english')
                @if($direction == 'asc')
                    <i class="fas fa-sort-alpha-up float-right"></i>
                @else
                    <i class="fas fa-sort-alpha-down float-right"></i>
                @endif
            @else
                <i class="fas fa-sort float-right"></i>
            @endif
        </th>
        <th>{{__("Short")}}</th>
        <th colspan="2" class="text-center">{{__("Actions")}}</th>
    </tr>
</thead>

