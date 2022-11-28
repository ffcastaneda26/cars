<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\JobType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobTypes extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:job_types,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:job_types,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:job_types,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:job_types,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'time_type.index');
        $this->manage_title = __('Manage') . ' ' . __('Job Types');
        $this->search_label = __('Job Type');
        $this->view_form    = 'livewire.job_types.form';
        $this->view_table   = 'livewire.job_types.table';
        $this->view_list    = 'livewire.job_types.list';
        $this->main_record  = new JobType();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Job Type')
                                                            : __('Create') . ' ' . __('Job Type');

        $records = JobType::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }



    public function resetInputFields()
    {
        $this->main_record = new JobType();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:job_types,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:job_types,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:job_types,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:job_types,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:job_types,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:job_types,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:job_types,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:job_types,short_english';

        $this->validate();
        $this->close_store('Job Type');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(JobType $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Job Type');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(JobType $record)
    {
        $this->delete_record($record, __('Job Type') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');

    }

}
