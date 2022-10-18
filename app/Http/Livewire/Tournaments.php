<?php

namespace App\Http\Livewire;

use App\Models\Sport;
use Livewire\Component;
use App\Traits\UserTrait;

use App\Models\Tournament;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\CrudTrait;
use App\Traits\FilesTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Tournaments extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use WithFileUploads;
    use FilesTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.sport_id'                  => 'required|exists:sports,id',
        'main_record.name'                      => 'required|min:5|max:100',
        'main_record.allow_ties'                => 'nullable',
        'main_record.require_all_picks'         => 'nullable',
        'main_record.minutes_before_to_edit'    => 'required|min:1|max:9999',
        'main_record.available_user_at_register'=> 'nullable',
        'main_record.create_picks_at_available' => 'nullable',
        'main_record.logotipo'                  => 'nullable',
    ];

    public $sports                      = null;
    public $allow_ties                  = false;
    public $require_all_picks           = false;
    public $available_user_at_register  = false;
    public $create_picks_at_available   = false;
    public $file_path;


    public function mount()
    {
        $this->authorize('hasaccess', 'tournaments.index');
        $this->manage_title = __('Manage') . ' ' . __('Tournaments');
        $this->search_label = __('Name');
        $this->view_form    = 'livewire.tournaments.form';
        $this->view_table   = 'livewire.tournaments.table';
        $this->view_list    = 'livewire.tournaments.list';
        $this->main_record  = new Tournament();
        $this->fill_combos();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Tournament')
                                                            : __('Create') . ' ' . __('Tournament');

        return view('livewire.index', [
            'records' => Tournament::Name($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Tournament();
        $this->reset('file_path','allow_ties','require_all_picks','available_user_at_register','create_picks_at_available');
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->allow_ties = $this->allow_ties ? 1 : 0;
        $this->main_record->require_all_picks = $this->require_all_picks ? 1 : 0;
        $this->main_record->available_user_at_register = $this->available_user_at_register ? 1 : 0;
        $this->main_record->create_picks_at_available = $this->create_picks_at_available ? 1 : 0;
        if($this->file_path){
            $this->validate([
                'file_path'    => 'image|max:2048',
            ]);
            $this->main_record->logotipo = $this->store_main_record_file($this->file_path,'tournaments',true);
        }

        $this->main_record->save();
        $this->close_store('Tournament');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Tournament $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->allow_ties                   = $record->allow_ties;
        $this->require_all_picks            = $record->require_all_picks;
        $this->available_user_at_register   = $record->available_user_at_register;
        $this->create_picks_at_available    = $record->create_picks_at_available;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Tournament $record)
    {
        $this->delete_record($record, __('Tournament') . ' ' . __('Deleted Successfully!!'));
    }

    /*+---------------------+
      | Llena Combos        |
      +---------------------+
    */
    public function fill_combos(){
        if (App::isLocale('en')) {
            $this->sports = Sport::orderby('english')->get();
        } else {
            $this->sports = Sport::orderby('spanish')->get();
        }
    }
}
