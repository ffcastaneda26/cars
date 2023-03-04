<tr>
    <td>{{ $record->dealer->name }}</td>
    <td>{{ $record->model_year }}</td>
    <td>{{ $record->make->name }}</td>
    <td>{{ $record->model->name }}</td>
    <td>{{ $record->style->name}}</td>
    <td>{{ $record->stock }}</td>


    <td colspan="3" class="px-1 text-center">

        <a href="{{ route('vehicles-photos', $record->id) }}">
            <button type="button"
                class=" btn {{  $record->total_photos() ?  'btn-warning' : ' btn-secondary' }} waves-effect"
                title="{{__("Upload Photos")}}">
                <i class="{{ $record->total_photos() ?  'mdi mdi-camera' : ' mdi mdi-camera-off' }} "></i>
                {{ $record->total_photos() ? $record->total_photos() : ''}}
            </button>
        </a>

        <button type="button"
            wire:click="edit({{ $record->id }})"
            class="btn btn-success waves-effect"
            data-target="sample-modal"
            title="{{__("Edit")}}">
            <i class="mdi mdi-eye-circle"></i>
        </button>

        @if($record->can_be_delete())
            <button  onclick="confirm_modal({{$record->id}})"
                class="btn btn-danger waves-effect waves-light"
                data-bs-toggle="modal"
                data-bs-target="#mySmallModalLabel"
                title="{{__("Delete")}}">
                <i class="mdi mdi-delete"></i>
            </button>
        @else
            <button  type="button"
                class="btn btn-danger waves-effect waves-light"
                data-target="sample-modal"
                disabled
                title="{{__("It ca not delete")}}">
                <i class="mdi mdi-delete"></i>
            </button>
        @endif
    </td>
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
