<?php


namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Modell;

use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Requirement;
use Livewire\WithPagination;
use App\Traits\VariablesTrait;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Requirements extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use VariablesTrait;



    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'          =>'required|min:3|max:80',
        'main_record.phone'         =>'required|digits:10',
        'main_record.model_year'    =>'required|digits:4',
        'main_record.make_id'       =>'required|exists:makes,id',
        'main_record.model_id'      =>'required|exists:models,id',
        'main_record.max_miles'     =>'required|numeric',
        'main_record.downpayment'   =>'required|numeric',
        'main_record.type_financing'=>'required',
        'main_record.details'   =>'nullable',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'requirements.index');
        $this->manage_title = __('Manage') . ' ' . __('Requirements');
        $this->search_label = __('Name,Phone');
        $this->view_form    = 'livewire.requirements.form';
        $this->view_table   = 'livewire.requirements.table';
        $this->view_list    = 'livewire.requirements.list';
        $this->view_search    = 'livewire.requirements.search';

        $this->main_record  = new Requirement();
        $this->makesList    = Make::orderby('name')->get();

        $this->modelsList  = Modell::select('id','name')
                                ->orderby('name')
                                ->get();


    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Requirement')
                                                            : __('Create') . ' ' . __('Requirement');

        $records = Requirement::Complete($this->search)
                                ->ModelYear($this->search_model_year)
                                ->ModelYear($this->search_make_id)
                                ->ModelYear($this->search_model_id)
                                ->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }

    public function read_make(){
        if($this->main_record->make_id){
            $this->make = Make::findOrFail($this->main_record->make_id);
        }
    }

    public function resetInputFields()
    {
        $this->main_record = new Requirement();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->close_store('Requirement');
        $this->record_id    =null;
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Requirement $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+----------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Requirement $record)
    {
        $this->delete_record($record, __('Requirement') . ' ' . __('Deleted Successfully!!'));
        $this->reset('search');
    }
}
