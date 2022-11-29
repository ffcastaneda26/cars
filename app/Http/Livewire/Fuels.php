<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Fuel;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Fuels extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25|unique:fuels,spanish',
        'main_record.english'       => 'required|min:3|max:25|unique:fuels,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'fuels.index');
        $this->manage_title = __('Manage') . ' ' . __('Fuels');
        $this->search_label = __('Fuel');
        $this->view_form    = 'livewire.Fuels.form';
        $this->view_table   = 'livewire.Fuels.table';
        $this->view_list    = 'livewire.Fuels.list';
        $this->main_record  = new Fuel();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Fuel')
                                                            : __('Create') . ' ' . __('Fuel');

        $records = Fuel::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Fuel();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:fuels,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:fuels,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:fuels,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:fuels,english';

        $this->validate();
        $this->close_store('Fuel');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Fuel $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Fuel');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Fuel $record)
    {
        $this->delete_record($record, __('Fuel') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
