<tr>
   @if(App::isLocale('en'))
        <td class="border px-4 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">
            {{ $record->english }}
        </td>
        <td class="border px-4 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">
            {{ $record->english_description }}
        </td>
    @else
        <td class="border px-4 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">
            {{ $record->spanish }}
        </td>
        <td class="border px-4 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600">
            {{ $record->spanish_description }}
        </td>
    @endif
   
    <td class="border px-4 py-1 leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 text-center">
    <input type="checkbox" disabled
        @if($record->full_access)  checked @endif>
    </td>
    
    @include('common.crud_actions')
</tr>
