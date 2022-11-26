<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\TimesHire;
use App\Models\TimeType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TimeHires extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:times_to_hire,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:times_to_hire,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:times_to_hire,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:times_to_hire,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'time_type.index');
        $this->manage_title = __('Manage') . ' ' . __('Times to Hire');
        $this->search_label = __('Time to Hire');
        $this->view_form    = 'livewire.times_hire.form';
        $this->view_table   = 'livewire.times_hire.table';
        $this->view_list    = 'livewire.times_hire.list';
        $this->main_record  = new TimesHire();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Time to Hire')
                                                            : __('Create') . ' ' . __('Time to Hire');

        $records = TimesHire::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }



    public function resetInputFields()
    {
        $this->main_record = new TimeType();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:times_to_hire,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:times_to_hire,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:times_to_hire,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:times_to_hire,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:times_to_hire,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:times_to_hire,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:times_to_hire,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:times_to_hire,short_english';

        $this->validate();
        $this->close_store('Time to Hire');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(TimesHire $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Time to Hire');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(TimesHire $record)
    {
        $this->delete_record($record, __('Time to Hire') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');

    }

}
