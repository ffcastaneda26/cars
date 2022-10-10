<div class="container">
    <div class="text-danger">
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>
    <div class="row align-items-start">
        <div class="col-md-4 flex flex-col">
            <label class="input-group-text mb-2">{{__("Round")}}</label>
            <label class="input-group-text mb-2">{{__("Date")}}</label>
            {{-- <label class="input-group-text mb-2">{{__("Hour")}}</label> --}}
            {{-- <label class="input-group-text mb-2">{{__("Visita")}}</label> --}}
            <label class="input-group-text mb-2">{{__("Local")}}</label>
            <label class="input-group-text mb-2">{{__("Visit")}}</label>
            <label class="input-group-text mb-2">{{__("Request Score")}}</label>

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
                <div class="w-auto">
                    <input type="datetime-local"
                            required min=<?php $hoy = date('Y-m-d'); echo $hoy; ?>
                            wire:model="main_record.date"
                            required placeholder="{{ __('Date') }}"
                            class="form-control mb-2"
                    >
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
            {{-- Pedir Marcador en partidos? --}}

            <div class="flex-flex-column mb-2">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" wire:model="request_score" class="btn-check" name="type" id="score_yes" value="1">
                    <label class="btn btn-outline-info" for="score_yes">{{__('Yes')}}</label>

                    <input type="radio" wire:model="request_score" class="btn-check ml-4" name="type" id="score_no" value="0">
                    <label class="btn btn-outline-warning" for="score_no">{{__('No')}}</label>
                </div>
            </div>


        </div>
    </div>

</div>
