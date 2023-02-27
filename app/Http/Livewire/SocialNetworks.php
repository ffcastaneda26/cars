<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Models\SocialNetwork;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SocialNetworks extends Component
{
    use WithFileUploads;

    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];
    public $active, $logotipo;


    protected $rules = [
        'main_record.name'       => 'required|min:3|max:30|unique:social_networks,name'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'social_networks.index');
        $this->manage_title = __('Manage') . ' ' . __('Social Networks');
        $this->search_label = __('Social Network');
        $this->view_form    = 'livewire.social_networks.form';
        $this->view_table   = 'livewire.social_networks.table';
        $this->view_list    = 'livewire.social_networks.list';
        $this->main_record  = new SocialNetwork();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Social Network')
                                                            : __('Create') . ' ' . __('Social Network');

        $records = SocialNetwork::Name($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->reset('active', 'logotipo');
        $this->main_record = new SocialNetwork();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:3|max:30|unique:social_networks,name,{$this->main_record->id}"
                                                                  : 'required|min:3|max:30|unique:social_networks,name';


        $this->validate();

        $this->main_record->active = $this->active ? 1 : 0;

        if($this->logotipo){
            $Image = $this->logotipo->Store('public/social_networks');
            $this->main_record->logotipo = $Image;
        }

        $this->main_record->save();

        $this->close_store('Social Network');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(SocialNetwork $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;

        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(SocialNetwork $record)
    {
        $this->delete_record($record, __('Social Network') . ' ' . __('Deleted Successfully!!'));
        $this->reset('search');
    }

}

