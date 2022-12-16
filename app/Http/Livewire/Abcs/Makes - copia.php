<?php


namespace App\Http\Livewire;


use App\Models\Make;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Makes extends Component
{
    use WithFileUploads;

    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];
    public $logotipo;


    protected $rules = [
        'main_record.name'       => 'required|min:3|max:200|unique:makes,name'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'makes.index');
        $this->manage_title = __('Manage') . ' ' . __('Makes');
        $this->search_label = __('Make');
        $this->view_form    = 'livewire.makes.form';
        $this->view_table   = 'livewire.makes.table';
        $this->view_list    = 'livewire.makes.list';
        $this->main_record  = new Make();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Make')
                                                            : __('Create') . ' ' . __('Make');

        $records = Make::Name($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->reset('logotipo');
        $this->main_record = new Make();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:3|max:200|unique:makes,name,{$this->main_record->id}"
                                                                  : 'required|min:3|max:200|unique:makes,name';


        $this->validate();


        if($this->logotipo){
            $Image = $this->logotipo->Store('public/makes');
            $this->main_record->logotipo = $Image;
        }

        $this->main_record->save();

        $this->close_store('Make');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Make $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Make');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Make $record)
    {
        $this->delete_record($record, __('Make') . ' ' . __('Deleted Successfully!!'));
        $this->reset('search');
    }

}

