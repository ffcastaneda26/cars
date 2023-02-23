<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;

use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Style;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Styles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.name'       => 'required|min:5|max:25|unique:styles,name'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'styles.index');
        $this->manage_title = __('Manage') . ' ' . __('Styles');
        $this->search_label = __('Style');
        $this->view_form    = 'livewire.styles.form';
        $this->view_table   = 'livewire.styles.table';
        $this->view_list    = 'livewire.styles.list';
        $this->main_record  = new Style();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Style')
                                                            : __('Create') . ' ' . __('Style');

        $records = Style::Name($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Style();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:5|max:25|unique:styles,name,{$this->main_record->id}"
                                                                  : 'required|min:5|max:25|unique:styles,name';
         $this->validate();
        $this->close_store('Style');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Style $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Style $record)
    {
        $this->delete_record($record, __('Style') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}

