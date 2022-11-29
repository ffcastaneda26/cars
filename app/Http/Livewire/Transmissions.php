<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\transmission;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Transmissions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25|unique:transmissions,spanish',
        'main_record.english'       => 'required|min:3|max:25|unique:transmissions,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'transmissions.index');
        $this->manage_title = __('Manage') . ' ' . __('Transmissions');
        $this->search_label = __('Transmission');
        $this->view_form    = 'livewire.transmissions.form';
        $this->view_table   = 'livewire.transmissions.table';
        $this->view_list    = 'livewire.transmissions.list';
        $this->main_record  = new Transmission();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Transmission')
                                                            : __('Create') . ' ' . __('Transmission');

        $records = Transmission::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Transmission();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:transmissions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:transmissions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:transmissions,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:transmissions,english';

        $this->validate();
        $this->close_store('transmission');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Transmission $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Transmission $record)
    {
        $this->delete_record($record, __('transmission') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
