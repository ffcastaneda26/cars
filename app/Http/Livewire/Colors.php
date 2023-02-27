<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Color;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Colors extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:50|unique:colors,spanish',
        'main_record.english'       => 'required|min:3|max:50|unique:colors,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'colors.index');
        $this->manage_title = __('Manage') . ' ' . __('Colors');
        $this->search_label = __('Color');
        $this->view_form    = 'livewire.colors.form';
        $this->view_table   = 'livewire.colors.table';
        $this->view_list    = 'livewire.colors.list';
        $this->main_record  = new Color();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Color')
                                                            : __('Create') . ' ' . __('Color');

        $records = Color::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Color();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:50|unique:colors,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:50|unique:colors,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:50|unique:colors,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:50|unique:colors,english';

        $this->validate();
        $this->close_store('Color');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Color $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Color');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Color $record)
    {
        $this->delete_record($record, __('Color') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
