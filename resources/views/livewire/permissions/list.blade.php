<tr>
    @if(App::isLocale('en'))
        <td class="border leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 px-4 py-1">
            {{ $record->english }}
        </td>
        <td class="border leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 px-4 py-1">
            {{ $record->english_description }}
        </td>
    @else
        <td class="border leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 px-4 py-1">
            {{ $record->spanish }}
        </td>
        <td class="border leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 px-4 py-1">
            {{ $record->spanish_description }}
        </td>
    @endif
    <td class="border leading-relaxed sm:text-base md:text-xl xl:text-base text-gray-600 px-4 py-1">{{ $record->slug }}</td>
    @include('common.crud_actions')
</tr>
