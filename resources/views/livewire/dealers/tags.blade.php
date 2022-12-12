@include('common.crud_header')
<div class="py-4 px-4">
    @include('common.crud_message')
        <div class="mb-2">
                <div class="grid grid-cols-2 gap-2 mt-4">
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-4 xl:col-span-2">
                        <table>
                            <thead>
                                <tr class="w-auto bg-dark text-white">
                                    <th >{{__("Tag")}}</th>
                                    <th>{{__("Action")}}</th>
                                </tr>
                            </thead>


                            @forelse($records as $record)
                                <tr class="h5">
                                    {{--  Lista de Etiquetas  --}}
                                    <td>
                                        {{ App::isLocale('en') ? $record->english :  $record->spanish }}
                                    </td>

                                    <td>
                                        @if($record->hasDealer($dealer->id))
                                            <button wire:click="unlinkRecord({{ $record->id }})" class="btn btn-lg btn-danger">{{__("Remove")}}</button>
                                        @else

                                            <button wire:click="linkRecord({{ $record->id }})"
                                                class="btn btn-lg btn-success"
                                                @if($dealer->tags->count() >= $this->dealer->package->max_tags_higlights)
                                                    disabled
                                                @endif
                                                >
                                                {{__("To assign")}}
                                            </button>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                                @include('common.no_records_found')
                            @endforelse

                        </table>
                        @include('common.pagination')
                    </div>
                </div>


        </div>
    </div>
</div>
