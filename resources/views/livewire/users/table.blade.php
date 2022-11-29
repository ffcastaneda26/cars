<table class="table-fixed w-auto">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-2 py-1">{{__("Name")}}</th>
            <th class="px-2 py-1">{{__("Email")}}</th>
            <th class="px-2 py-1">{{__("Rol")}}</th>
            <th class="px-2 py-1">{{__("Active")}}</th>
            <th class="px-2 py-1 text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    @include('livewire.each_record')
</table>
