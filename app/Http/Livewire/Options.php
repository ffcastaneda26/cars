<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Promotion;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Options extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    public $active;
    public $questions=null;

    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:100|unique:options,spanish',
        'main_record.english'       => 'required|min:5|max:100|unique:options,english',
        'main_record.question_id'   => 'required|exists:questions,id',

    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'options.index');
        $this->manage_title = __('Manage') . ' ' . __('Option');
        $this->search_label = __('Option');
        $this->view_form = 'livewire.options.form';
        $this->view_table = 'livewire.options.table';
        $this->view_list = 'livewire.options.list';
        $this->main_record = new Option();
        $this->questions = Question::all();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Option');

        return view('livewire.index', [
            'records' => Option::Option($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Option();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:100|unique:options,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:100|unique:options,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:100|unique:options,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:100|unique:options,english';

        $this->validate();
        $this->main_record->save();
        $this->close_store('Option');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Option $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Option');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Option $record)
    {
        $this->delete_record($record, __('Option') . ' ' . __('Deleted Successfully!!'));
    }
}

