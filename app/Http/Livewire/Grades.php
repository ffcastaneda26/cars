<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Grade;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Grades extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:grades,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:grades,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:grades,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:grades,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'grade.index');
        $this->manage_title = __('Manage') . ' ' . __('Grades');
        $this->search_label = __('Grade');
        $this->view_form    = 'livewire.grades.form';
        $this->view_table   = 'livewire.grades.table';
        $this->view_list    = 'livewire.grades.list';
        $this->main_record  = new Grade();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Grade')
                                                            : __('Create') . ' ' . __('Grade');

        $records = Grade::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Grade();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:grades,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:grades,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:grades,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:grades,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:grades,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:grades,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:grades,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:grades,short_english';

        $this->validate();
        $this->close_store('Grade');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Grade $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Grade');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Grade $record)
    {
        $this->delete_record($record, __('Grade') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}

