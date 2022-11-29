<table class="table w-auto">
    <thead>
        <tr class="bg-gray-100">
        <th class="px-2 py-1">{{__("Name")}}</th>
        <th class="px-2 py-1">{{__("Slug")}}</th>
        <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    @include('livewire.each_record')
</table>
