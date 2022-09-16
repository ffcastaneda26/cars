<div class="d-flex flex-row gap-5">
                
    <select wire:model="role_id"
        wire:change="read_role()"
        class="col-md-3">
            <option value="">{{__('Select Role')}}</option>
            @foreach($roles as $record_role)
                <option  value="{{$record_role->id}}">
                        @if(App::isLocale('en'))
                            {{$record_role->english}}
                        @else
                            {{$record_role->spanish}}
                        @endif
                </option>
            @endforeach
    </select>

    @if($role)
        <div class="inline">
            <input type="text"
            wire:model="search"
            placeholder="{{__($search_label)}}"
        >
        </div>

        {{-- @include('common.read_only_linked_records') --}}
    @endif


</div>