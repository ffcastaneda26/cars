<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Team;
use App\Models\Round;
use Livewire\Component;
use App\Traits\UserTrait;

use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Games extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.round_id'              => 'required|exists:rounds,id',
        'main_record.date'                  => 'required|date',
        'main_record.hour'                  => 'required|min:0|max:23',
        'main_record.minute'                => 'required|min:0|max:59',
        'main_record.local_team_id'         => 'required|different:main_record.visit_team_id|exists:teams,id',
        'main_record.visit_team_id'         => 'required|different:main_record.local_team_id|exists:teams,id',
        'main_record.local_score'           => 'nullable|min:0|max:99',
        'main_record.visit_score'           => 'nullable|min:0|max:99',
        'main_record.points_winner'         => 'nullable',
        'main_record.extra_points_winner'   => 'nullable',
    ];

    public $teams           = null;
    public $rounds          = null;
    public $round           = null;
    public $round_id        = null;
    public $show_round      = false;

    public function mount()
    {
        $this->authorize('hasaccess', 'games.index');
        $this->manage_title = __('Manage') . ' ' . __('Games');
        $this->search_label = null;
        $this->view_search  = null;
        $this->view_form    = 'livewire.games.form';
        $this->view_table   = 'livewire.games.table';
        $this->view_list    = 'livewire.games.list';
        $this->main_record  = new Game();
        $this->fill_combos();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Game')
                                                            : __('Create') . ' ' . __('Game');

        return view('livewire.index', [
            'records' => Game::paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Game();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->save();
        $this->close_store('Game');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Game $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Game $record)
    {
        $this->delete_record($record, __('Game') . ' ' . __('Deleted Successfully!!'));
    }

    /*+---------------------+
      | Llena Combos        |
      +---------------------+
    */
    public function fill_combos(){
        $this->teams = Team::orderby('name')->get();
        $this->rounds = Round::orderby('from')->get();
        if($this->rounds->count() == 1){
            $this->round = $this->rounds->first();
            $this->main_record->round_id = $this->round->id;
            
        }
        $this->show_round = $this->rounds->count() > 1 ;
    }
}
