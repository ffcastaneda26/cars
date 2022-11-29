@if($record->active)
    <tr class="text-gray-600 font">
@else
    <tr class="text-red-600 line-through font-extrabold">
@endif

    <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base ">{{ $record->name }}</td>
    <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base">{{ $record->email }}</td>
    <td class="border px-2 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base">
        @foreach($record->roles as $role)
            @if(App::isLocale('en'))
                {!! $role->english_description !!}
            @else
                {!! $role->spanish_description !!}
            @endif
        @endforeach
    </td>
     <td class="border px-4 py-1 w-20 text-center">
        <input type="checkbox" disabled
         @if($record->active)  checked @endif>
     </td>
     <td class="border px-2 py-1 text-center">
        <button wire:click="edit({{ $record->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">{{__("Edit")}}</button>
    </td>
</tr>
