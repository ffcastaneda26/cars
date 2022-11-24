<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Nationality;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Nationalities extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:nationalities,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:nationalities,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:nationalities,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:nationalities,short_english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'nationality.index');
        $this->manage_title = __('Manage') . ' ' . __('Nationalities');
        $this->search_label = __('Nationality');
        $this->view_form    = 'livewire.nationalities.form';
        $this->view_table   = 'livewire.nationalities.table';
        $this->view_list    = 'livewire.nationalities.list';
        $this->main_record  = new Nationality();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Nationality')
                                                            : __('Create') . ' ' . __('Nationality');

        $records = Nationality::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Nationality();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:nationalities,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:nationalities,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:nationalities,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:nationalities,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:nationalities,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:nationalities,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:nationalities,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:nationalities,short_english';

        $this->validate();
        $this->close_store('Nationalitiy');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Nationality $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Nationality');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Nationality $record)
    {
        $this->delete_record($record, __('Nationality') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
