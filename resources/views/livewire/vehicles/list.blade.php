<tr>
    <td>{{ $record->make }}</td>
    <td>{{ $record->model }}</td>
    <td>{{ $record->model_year }}</td>
    <td>{{ $record->product_type}}</td>
    <td>{{ $record->body}}</td>
    <td>{{ $record->trim}}</td>
    <td>
        @if($record->miles)
            {{number_format($record->miles, 0, '.', ',') }}
        @endif

    </td>
    <td class="text-center">
        <img src="{{ $record->available ? asset('images/acertado.png') : asset('images/fallado.png')}}"
            alt="{{ $record->available ? __('Yes') : __('No') }}"
            height="24px"
            width="24px"
            class="rounded-circle"
        >
    </td>
    <td class="text-right">
        @if($record->price)
            ${{number_format($record->price, 2, '.', ',') }}
        @endif
    </td>
    @if($max_premium_allowed)
        <td class="text-center">
            <input type="checkbox"
                    wire:click="change_premium({{ $record }})"
                    @checked(old('active', $record->premium)) 
                    @if(!$record->premium)
                        @disabled(!$allow_change_premium)
                    @endif
            />
        </td>
    @endif


    @include('common.crud_actions')
</tr>
<style>
    input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  padding: 8px;
}
</style>
