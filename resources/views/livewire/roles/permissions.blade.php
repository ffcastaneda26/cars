@include('common.crud_header')
<div class="py-4 px-4">
    @include('common.crud_message')
        <div class="row">
            <div class="col-md-4">
                <select wire:model="role_id"
                    wire:change="read_role()"
                    class="form-select">
                    <option value="">{{__('Select Role')}}</option>
                    @foreach($roles as $record_role)
                        <option
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
            <div class="col-md-3">
                @if($role)
                    <div class="inline">
                        <input type="text"
                        wire:model="search"
                        placeholder="{{__($search_label)}}"
                        class="form-control"
                        >
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                @include('common.read_only_linked_records')
            </div>
        </div>
            @if($role)
                <div class="row">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-2 py-1 w-72">{{__("Description")}}</th>
                                    <th class="px-2 py-1 text-center w-28">{{__("Action")}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($records as $record)
                                <tr>
                                    <td>
                                        @if(App::isLocale('en'))
                                            {{ $record->english}}
                                        @else
                                            {{ $record->spanish}}
                                        @endif

                                    </td>
                                    <td>
                                        @if($record->hasrole($role->id))
                                            <button wire:click="unlinkRecord({{ $record->id }})" class="btn btn-danger btn-lg">{{__("Remove")}}</button>
                                        @else
                                            <button wire:click="linkRecord({{ $record->id }})" class="btn btn-info btn-lg">{{__("To Assign")}}</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('common.pagination')
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
