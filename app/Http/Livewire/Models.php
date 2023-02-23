<?php


namespace App\Http\Livewire;


use App\Models\Make;
use App\Models\Model;
use App\Models\Modell;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Traits\VariablesTrait;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Models extends Component
{

    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use VariablesTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.make_id'   => 'required|exists:makes,id',
        'main_record.name'       => 'required|min:3|max:50|unique:models,name'
    ];



    public function mount()
    {
        $this->authorize('hasaccess', 'models.index');
        $this->manage_title = __('Manage') . ' ' . __('Models');
        $this->search_label = __('Model');
        $this->view_form    = 'livewire.models.form';
        $this->view_table   = 'livewire.models.table';
        $this->view_list    = 'livewire.models.list';
        $this->makesList    = Make::orderby('name')->get();
        $this->main_record  = new Modell();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Model')
                                                            : __('Create') . ' ' . __('Model');
        return view('livewire.index', [
            'records' => Modell::Name($this->search)->paginate($this->pagination),
        ]);

    }


    public function resetInputFields()
    {
        $this->main_record = new Modell();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:3|max:50|unique:models,name,{$this->main_record->id}"
                                                                  : 'required|min:3|max:50|unique:models,name';


        $this->validate();

        $this->main_record->save();
        $this->close_store('Model');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Model $record)
    {
        $this->editRecord($record);
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Model $record)
    {
        $this->delete_record($record, __('Model') . ' ' . __('Deleted Successfully!!'));
        $this->reset('search');
    }

}


