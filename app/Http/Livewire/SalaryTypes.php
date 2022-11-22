<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\SalaryType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SalaryTypes extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:statuses,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:statuses,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:statuses,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:statuses,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'salary_type.index');
        $this->manage_title = __('Manage') . ' ' . __('Salary Types');
        $this->search_label = __('Salary Type');
        $this->view_form    = 'livewire.salary_types.form';
        $this->view_table   = 'livewire.salary_types.table';
        $this->view_list    = 'livewire.salary_types.list';
        $this->main_record  = new SalaryType();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Salary Type')
                                                            : __('Create') . ' ' . __('Salary Type');

        $records = SalaryType::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }



    public function resetInputFields()
    {
        $this->main_record = new SalaryType();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:statuses,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:statuses,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:statuses,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:statuses,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:statuses,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:statuses,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:statuses,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:statuses,short_english';

        $this->validate();
        $this->close_store('Salary Type');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(SalaryType $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Salary Type');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(SalaryType $record)
    {
        $this->delete_record($record, __('Salary Type') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');

    }

}
