<div class="container">
    <x-jet-validation-errors></x-jet-validation-errors>
        <div class="card" >
            <div class="card-body">
              <h3 class="card-title">{{ $user->name }} </h3>
              <h5 class="card-subtitle mb-2 text-muted">{{ $user->email }} {{ $user->phone }}</h5>

              <div class="d-flex">

                {{-- Estado --}}
                <div class="p-2">
                    <label class="input-group-text">
                        {{ __('Status') }}
                    </label>
                </div>

                <div class="p-2 w-40">
                    <select wire:model="status_id"
                            class="form-select mb-2">
                            <option value="">{{__("Status")}}</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">
                                    {{ App::isLocale('en') ? $status->english : $status->spanish }}
                                </option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>

</div>
