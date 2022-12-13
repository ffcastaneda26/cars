<div class="w-auto flex flex-col">
    <label class="input-group-text mb-2">{{ __('Interior Color') }}</label>
    <label class="input-group-text mb-2">{{ __('Exterior Color') }}</label>
    <label class="input-group-text mb-2">{{ __('Price') }}</label>
    <label class="input-group-text mb-2">{{ __('Miles') }}</label>
    <label class="input-group-text mb-2">{{ __('Available') }}</label>
    <label class="input-group-text mb-2">{{ __('Show') }}</label>
    @if($max_premium_allowed)
        <label class="input-group-text mb-2">{{ __('Premium?')}}</label>
    @endif
</div>
