<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Traits\FilesTrait;
use App\Traits\ZipCodeTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Teams extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithFileUploads;

    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;
    use FilesTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'          => 'required|min:3|max:50',
        'main_record.alias'         => 'nullable|min:3|max:20',
        'main_record.short'         => 'required|min:3|max:6',
        'main_record.request_score' => 'nullable',
        'main_record.active'        => 'nullable',
        'main_record.logotipo'      => 'nullable'
    ];


    public $active;
    public $request_score;

    public $file_path;

    public function mount()
    {
        $this->authorize('hasaccess', 'teams.index');
        $this->manage_title = __('Manage') . ' ' . __('Teams');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.teams.form';
        $this->view_table = 'livewire.teams.table';
        $this->view_list = 'livewire.teams.list';
        $this->main_record = new Team();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Team')
                                                            : __('Create') . ' ' . __('Team');

        return view('livewire.index', [
            'records' => Team::Team($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->reset('file_path');
        $this->main_record = new Team();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;
        $this->main_record->request_score = $this->request_score ? 1 : 0;

        if($this->file_path){
            $this->validate([
                'file_path'    => 'image|max:2048',
            ]);
            $this->main_record->logotipo = $this->store_main_record_file($this->file_path,'teams',true);
        }

        $this->main_record->save();
        $this->close_store('Team');

    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Team $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->active       = $record->active;
        $this->request_score= $record->request_score;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Team $record)
    {
        $this->delete_record($record, __('Team') . ' ' . __('Deleted Successfully!!'));
    }
}


