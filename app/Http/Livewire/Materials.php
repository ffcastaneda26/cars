<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Material;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Materials extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:50|unique:materials,spanish',
        'main_record.english'       => 'required|min:3|max:50|unique:materials,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'Materials.index');
        $this->manage_title = __('Manage') . ' ' . __('Interior Materials');
        $this->search_label = __('Material');
        $this->view_form    = 'livewire.Materials.form';
        $this->view_table   = 'livewire.Materials.table';
        $this->view_list    = 'livewire.Materials.list';
        $this->main_record  = new Material();
    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Material')
                                                            : __('Create') . ' ' . __('Material');

        $records = Material::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Material();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:50|unique:materials,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:50|unique:materials,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:50|unique:materials,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:50|unique:materials,english';

        $this->validate();
        $this->close_store('Material');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Material $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Material');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Material $record)
    {
        $this->delete_record($record, __('Material') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
