<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Position;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Positions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:positions,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:positions,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:positions,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:positions,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'position.index');
        $this->manage_title = __('Manage') . ' ' . __('Positions');
        $this->search_label = __('Position');
        $this->view_form    = 'livewire.positions.form';
        $this->view_table   = 'livewire.positions.table';
        $this->view_list    = 'livewire.positions.list';
        $this->main_record  = new Position();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Position')
                                                            : __('Create') . ' ' . __('Position');

        $records = Position::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Position();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:positions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:positions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:positions,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:positions,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:positions,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:positions,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:positions,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:positions,short_english';

        $this->validate();
        $this->close_store('Position');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Position $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Position');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Position $record)
    {
        $this->delete_record($record, __('Position') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
