<thead>
    <tr>
        {{-- <th>
            <i class="mdi mdi-account-key"></i>
            <i class="mdi mdi-cursor-pointer"></i>
            <i class="mdi mdi-badge-account ml-3" ></i>
            <i class="mdi mdi-badge-account-alert ml-3"></i>
            <i class="mdi mdi-badge-account-alert-outline ml-3"></i>
            <i class="mdi mdi-list-status ml-3"></i>
            <i class="mdi mdi-contacts ml-3"></i>
            <i class="mdi mdi-contacts-outline ml-3"></i>
            <i class="mdi mdi-contacts-outline ml-3"></i>
            <i class="mdi mdi-file-star ml-3"></i>
            <i class="mdi mdi-file-star-outline ml-3"></i>
            <i class="mdi mdi-account-star ml-3"></i>
            <i class="mdi mdi-account-star-outline ml-3"></i>
            <i class="mdi mdi-card-account-details-star ml-3"></i>
            <i class="mdi mdi-card-account-details-star-outline ml-3"></i>
        </th> --}}

    </tr>
    <tr class="bg-dark text-white">
        <th class="flex orderby"
            wire:click="order('first_name')">
            @if($sort == 'first_name')
                @if($direction == 'asc')
                    <span class=""><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt "></i>
                @endif
            @else
                <i class="fas fa-sort "></i>
            @endif
            {{__("Name")}}
        </th>



        <th class="flex orderby"
            wire:click="order('email')">
            @if($sort == 'email')
                @if($direction == 'asc')
                    <span class=""><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt "></i>
                @endif
            @else
                <i class="fas fa-sort "></i>
            @endif
            {{__("Email")}}
        </th>


        <th class="flex orderby"
            wire:click="order('phone')">
            @if($sort == 'phone')
                @if($direction == 'asc')
                    <span class=""><i class="fas fa-sort-alpha-up-alt"></i></span>
                @else
                    <i class="fas fa-sort-alpha-down-alt "></i>
                @endif
            @else
                <i class="fas fa-sort "></i>
            @endif
            {{__("Phone")}}
        </th>

        <th class="">
            {{__("Date")}}
        </th>
        <th>{{__("Status")}}</th>
        <th>{{__("Actions")}}</th>

    </tr>
</thead>
