<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Ethnicity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Ethnicities extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:80|unique:ethnicities,spanish',
        'main_record.english'       => 'required|min:3|max:80|unique:ethnicities,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'typesquestions.index');
        $this->manage_title = __('Manage') . ' ' . __('Ethnicity');
        $this->search_label = __('Ethnicity');
        $this->view_form = 'livewire.types_question.form';
        $this->view_table = 'livewire.types_question.table';
        $this->view_list = 'livewire.types_question.list';
        $this->main_record = new Ethnicity();

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Ethnicity');

        return view('livewire.index', [
            'records' => Ethnicity::Ethnicity($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Ethnicity();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:80|unique:ethnicities,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:80|unique:ethnicities,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:80|unique:ethnicities,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:80|unique:ethnicities,english';

        $this->validate();
        $this->main_record->save();

        $this->close_store('Ethnicity');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Ethnicity $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Ethnicity');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Ethnicity $record)
    {
        $this->delete_record($record, __('Ethnicity') . ' ' . __('Deleted Successfully!!'));
    }
}

