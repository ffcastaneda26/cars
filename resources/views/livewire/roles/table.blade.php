<table class="w-auto whitespace-no-wrap">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-1">{{__("Role")}}</th>
            <th class="px-4 py-1">{{__("Description")}}</th>
            <th class="px-4 py-1">{{__("Full Access?")}}</th>
            <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    <tbody>
        @each($view_list,$records,'record','common.no_records_found')
    </tbody>
</table>
