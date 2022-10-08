<?php

namespace App\Http\Livewire;

use App\Models\Round;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Rounds extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.from'  => 'required|date',
        'main_record.to'    => 'required|date',
        'main_record.active'=> 'nullable',
    ];


    public $active;

    public function mount()
    {
        $this->authorize('hasaccess', 'rounds.index');
        $this->manage_title = __('Manage') . ' ' . __('Rounds');
        $this->search_label = null;
        $this->view_search  = null;
        $this->view_form    = 'livewire.rounds.form';
        $this->view_table   = 'livewire.rounds.table';
        $this->view_list    = 'livewire.rounds.list';
        $this->main_record  = new Round();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Round')
                                                            : __('Create') . ' ' . __('Round');

        return view('livewire.index', [
            'records' => Round::paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Round();
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
        $this->main_record->save();
        $this->close_store('Round');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Round $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->active       = $record->active;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Round $record)
    {
        $this->delete_record($record, __('Round') . ' ' . __('Deleted Successfully!!'));
    }
}
