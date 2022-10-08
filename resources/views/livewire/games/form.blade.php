<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Round")}}</label>
            <label class="input-group-text mb-2">{{__("Date")}}</label>
            <label class="input-group-text mb-2">{{__("Hour")}}</label>
            <label class="input-group-text mb-2">{{__("Visita")}}</label>
            <label class="input-group-text mb-2">{{__("Local")}}</label>
            <label class="input-group-text mb-2">{{__("Visit")}}</label>
        </div>

        <div class="col flex flex-col">

        {{-- Round --}}
            <div class="flex-flex-column mb-2">
                <div class="col-lg-4">
                    <select  wire:model="main_record.round_id" 
                            class="form-select mb-2"

                        >

                        <option value="">{{ __('Round') }}</option>
                        @foreach ($rounds as $round_select)
                            <option
                                class="block mt-0 text-sm leading-tight font-semibold text-gray-900 hover:underline"
                                value="{{ $round_select->id }}">{{ $round_select->id }}
                            </option>
                        @endforeach
        
                    </select>
                </div>

            </div>

            {{-- Fecha --}}
            <div class="flex-flex-column mb-2">
                <div class="col-lg-6">
                    <input type="date" 
                            required min=<?php $hoy = date('Y-m-d'); echo $hoy; ?>
                            wire:model="main_record.date" 
                            required placeholder="{{ __('Date') }}"
                            class="form-control mb-2"
                    >
                </div>
            </div>
                
            {{-- Hora --}}
            <div class="flex-flex-column mb-2">
                <div class="col-md-3 flex flex-col alig-items-center">
                    <div class="col-md-3 flex flex-col alig-items-center">
                        <input type="number" 
                                wire:model="main_record.hour" 
                                min="0" 
                                max="23" 
                                required
                                class="form-control-sm mb-2"
                        >
                    </div>
                </div>
            </div>

            {{-- Minutos --}}
            <div class="flex-flex-column mb-2">
                <div class="col-md-3 flex flex-col alig-items-center">
                    <div class="col-md-3 flex flex-col alig-items-center">
                        <input type="number" 
                                wire:model="main_record.minute" 
                                min="0" 
                                max="59" 
                                required
                                class="form-control-sm mb-2"
                        >
                    </div>
                </div>
            </div>

            {{-- Local --}}
            <div class="flex-flex-column mb-2">
                <select wire:model="main_record.local_team_id"  
                        class="form-select form-select-md  rounded w-auto mb-2">
                    <option value="" selected>{{__("Local")}}</option>
                    @foreach($teams as $team_local)
                        <option value="{{ $team_local->id }}">{{ $team_local->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Visita --}}
            <div class="flex-flex-column mb-2">

                <select wire:model="main_record.visit_team_id"  
                        class="form-select form-select-md  rounded w-auto mb-2">
                    <option value="" selected>{{__("Visit")}}</option>
                    @foreach($teams as $team_visit)
                        <option value="{{ $team_visit->id }}">{{ $team_visit->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

</div>
