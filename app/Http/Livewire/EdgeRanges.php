<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;

use App\Models\EdgeRange;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EdgeRanges extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.edge_from' => 'required|min:1|max:99|unique:edge_ranges,edge_from',
        'main_record.edge_to'   => 'required|min:1|max:99|unique:edge_ranges,edge_to',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'typesquestions.index');
        $this->manage_title = __('Manage') . ' ' . __('Edge Range');
        $this->search_label = __('Edge Range');
        $this->view_form = 'livewire.edges_range.form';
        $this->view_table = 'livewire.edges_range.table';
        $this->view_list = 'livewire.edges_range.list';
        $this->main_record = new EdgeRange();

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Edge Range');

        return view('livewire.index', [
            'records' => EdgeRange::paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new EdgeRange();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.edge_from'] = $this->main_record->id ? "required|min:1|max:99|unique:edge_ranges,edge_from,{$this->main_record->id}"
                                                                     : 'required|min:1|max:99|unique:edge_ranges,edge_from';
        $this->rules['main_record.edge_to'] = $this->main_record->id ? "required|min:1|max:99|unique:edge_ranges,edge_to,{$this->main_record->id}"
                                                                     : 'required|min:1|max:99|unique:edge_ranges,edge_to';

        $this->validate();
        $this->main_record->save();

        $this->close_store('Edge Range');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(EdgeRange $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Edge Range');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(EdgeRange $record)
    {
        $this->delete_record($record, __('Edge Range') . ' ' . __('Deleted Successfully!!'));
    }
}

