<table class="table w-auto">
    <thead>
        <tr class="bg-gray-100">
        <th class="px-2 py-1">{{__("Dealer")}}</th>
        <th class="px-2 py-1">{{__("Make")}}</th>
        <th class="px-2 py-1">{{__("Model")}}</th>
        <th class="px-2 py-1">{{__("Color")}}</th>
        <th class="px-2 py-1">{{__("Transmission")}}</th>
        <th class="px-2 py-1">{{__("Drivetrain")}}</th>
        <th class="px-2 py-1">{{__("Trim")}}</th>
        <th class="px-2 py-1">{{__("Fuel")}}</th>
        <th colspan="2" class="px-4 py-1 text-center">{{__("Actions")}}</th>
        </tr>
    </thead>
    @include('livewire.each_record')
</table>
