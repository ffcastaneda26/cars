<thead>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('name')">{{__("Name")}}
            @if($sort == 'name')
                @if($direction == 'asc')
                    <span class="float-right"><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt float-right"></i>
                @endif
            @else
                <i class="fas fa-sort float-right"></i>
            @endif
        </th>

        <th>{{__("Email")}}</th>
        <th>{{__("Phone")}}</th>
        <th>{{__("Address")}}</th>
        <th>{{__("Zipcode")}}</th>
        <th>{{__("Logotipo")}}</th>
        <th class="text-center">{{__("Active")}}</th>
        <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
    </tr>
</thead>
