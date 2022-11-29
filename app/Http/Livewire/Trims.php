<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Trim;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Trims extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25|unique:trims,spanish',
        'main_record.english'       => 'required|min:3|max:25|unique:trims,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'trims.index');
        $this->manage_title = __('Manage') . ' ' . __('Trims');
        $this->search_label = __('Trim');
        $this->view_form    = 'livewire.trims.form';
        $this->view_table   = 'livewire.trims.table';
        $this->view_list    = 'livewire.trims.list';
        $this->main_record  = new Trim();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Trim')
                                                            : __('Create') . ' ' . __('Trim');

        $records = Trim::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Trim();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:trims,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:trims,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:trims,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:trims,english';

        $this->validate();
        $this->close_store('trim');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Trim $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Trim $record)
    {
        $this->delete_record($record, __('Trim') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
