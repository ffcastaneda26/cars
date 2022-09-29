@if ($promotion_id && $records)
    @forelse($records as $record)
        <tr class="h5">
            {{--  Lista de Paquetes  --}}
            @if(App::isLocale('en'))
                <td colspan="2" style="max-width: calc(100% - 95px - 35px);">{{ $record->english }} </td>
            @else
                <td colspan="2" style="max-width: calc(100% - 95px - 35px);">{{ $record->spanish }} </td>
            @endif

            @if($record->islinkedPromotion($promotion_id)->count())
                <td class="border px-4 py-1 text-center">
                    <button wire:click="unlinkRecord({{ $record->id }})" class="btn btn-lg btn-danger">{{__("Unlink")}}</button>
                </td>
            @else
                <td class="border px-4 py-1 text-center">
                    <button wire:click="linkRecord({{ $record->id }})" class="btn btn-lg btn-success">{{__("Link")}}</button>
                </td>
            @endif

        </tr>
    @empty
        @include('common.no_records_found')
    @endforelse
@endif
