<table class="table-fixed w-auto">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-2 py-1 w-70">{{__("Permission")}}</th>
            <th class="px-2 py-1 w-200">{{__("Description")}}</th>
            <th class="px-2 py-1 w-70">{{__("Slug")}}</th>
            <th colspan="2" class="px-4 py-1text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    @include('livewire.each_record')
</table>
