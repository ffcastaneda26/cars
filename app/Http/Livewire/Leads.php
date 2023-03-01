<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;

use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Lead;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Leads extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.name'  => 'required|min:3|max:80',
        'main_record.email' => 'nullable|email',
        'main_record.phone' => 'required|digits:10'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'leads.index');
        $this->manage_title = __('Manage') . ' ' . __('Lead');
        $this->search_label = __('Name,Phone,Email');
        $this->view_form    = 'livewire.leads.form';
        $this->view_table   = 'livewire.leads.table';
        $this->view_list    = 'livewire.leads.list';
        $this->main_record  = new Lead();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Lead')
                                                            : __('Create') . ' ' . __('Lead');

        $records = Lead::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Lead();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->close_store('Lead');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Lead $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+----------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Lead $record)
    {
        $this->delete_record($record, __('Lead') . ' ' . __('Deleted Successfully!!'));
        $this->reset('search');
    }
}
