<table class="table-auto w-full">
    <thead>
        <tr class="bg-gray-100">
        <th class="px-2 py-1">{{__("Name")}}</th>
        <th class="px-2 py-1">{{__("Address")}}</th>
        <th class="px-2 py-1">{{__("Zipcode")}}</th>
        <th class="px-2 py-1">{{__("Phone")}}</th>
        <th class="px-2 py-1">{{__("Email")}}</th>
        <th class="px-2 py-1">{{__("Logo")}}</th>
        <th class="px-2 py-1">{{__("Expire")}}</th>
        <th class="px-2 py-1">{{__("Active")}}</th>
            <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    <tbody>
        @each($view_list,$records,'record','common.no_records_found')
    </tbody>
</table>
