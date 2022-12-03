@include('common.crud_header')
<div class="py-4 px-4">
    @include('common.crud_message')
        <div class="mb-2">
            <div class="d-flex">
                <div class="div">
                    <select wire:model="role_id"
                        wire:change="read_role()"
                        class="form-control">
                            <option class="block mt-0 text-lg leading-tight font-serif text-gray-900 hover:underline" value="">{{__('Select Role')}}</option>
                            @foreach($roles as $record_role)
                                <option class="block mt-0 text-lg leading-tight font-serif text-gray-900 hover:underline"
                                        value="{{$record_role->id}}">
                                        @if(App::isLocale('en'))
                                            {{$record_role->english}}
                                        @else
                                            {{$record_role->spanish}}
                                        @endif

                                </option>
                            @endforeach
                    </select>
                </div>

                    @if($role)
                        <div class="mx-10 inline">
                            <input type="text"
                            wire:model="search"
                            placeholder="{{__($search_label)}}"
                            class="inline w-1/4 shadow appearance-none border rounded  py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                            >
                        </div>

                        <div class="mx-10 inline">
                            @include('common.read_only_linked_records')
                        </div>


                    @endif
                </div>
            </div>

            @if($role)

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-4 xl:col-span-2">
                        <table>
                            <thead>
                                <tr class="w-auto bg-dark text-white">
                                    <th >{{__("Permission")}}</th>
                                    <th>{{__("Action")}}</th>
                                </tr>
                            </thead>


                            @forelse($records as $record)
                                <tr class="h5">
                                    {{--  Lista de Permisos  --}}
                                    <td style="max-width: calc(100% - 95px - 35px);">
                                        {{ App::isLocale('en') ? $record->english :  $record->spanish }}
                                    </td>

                                    <td>
                                        @if($record->hasRole($role->id))

                                            <button wire:click="unlinkRecord({{ $record->id }})" class="btn btn-lg btn-danger">{{__("Unlink")}}</button>

                                        @else
                                            <button wire:click="linkRecord({{ $record->id }})" class="btn btn-lg btn-success">{{__("Link")}}</button>
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
            @endif

        </div>
    </div>
</div>
