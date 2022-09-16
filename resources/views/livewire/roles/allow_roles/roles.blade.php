@include('common.crud_header')
<div class="py-4 px-4">
    @include('common.crud_message')
        <div class="container">
            @include('livewire.roles.allow_roles.search')
            
            @if($role)

                <div class="grid grid-cols-2 gap-2 mt-4">
                    <div class="col-span-6 sm:col-span-2 md:col-span-6 lg:col-span-4 xl:col-span-2">
                        <table>
                            <thead>
                                <tr class="bg-dark text-white text-center">
                                    <th>{{__("Role")}}</th>
                                    <th class="px-2 py-1 text-center w-28">{{__("Action")}}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($records as $record)
                                  
                                        <tr class="h5">
                                            <td>
                                                @if(App::isLocale('en'))
                                                    {{ $record->id . '-' . $record->english}}
                                                @else
                                                {{ $record->id . '-' . $record->spanish}}
                                                @endif

                                            </td>
                                            <td>
                                                
                                                @if($role->hasAllowRole($record->id))
                                                    <button wire:click="unlinkRecord({{ $record->id }})" class="btn btn-danger">{{__("Remove")}}</button>
                                                @else
                                                    <button wire:click="linkRecord({{ $record->id }})" class="btn btn-success">{{__("Assign")}}</button>
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
