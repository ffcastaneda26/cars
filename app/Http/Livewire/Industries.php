<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Industry;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Industries extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:industries,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:industries,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:industries,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:industries,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'Industry.index');
        $this->manage_title = __('Manage') . ' ' . __('Industries');
        $this->search_label = __('Industry');
        $this->view_form    = 'livewire.industries.form';
        $this->view_table   = 'livewire.industries.table';
        $this->view_list    = 'livewire.industries.list';
        $this->main_record  = new Industry();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Industry')
                                                            : __('Create') . ' ' . __('Industry');

        $records = Industry::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Industry();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:industries,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:industries,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:industries,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:industries,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:industries,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:industries,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:industries,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:industries,short_english';

        $this->validate();
        $this->close_store('Nationalitiy');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Industry $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Industry');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Industry $record)
    {
        $this->delete_record($record, __('Industry') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
