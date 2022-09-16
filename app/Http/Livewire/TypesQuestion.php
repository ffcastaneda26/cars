<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\TypeQuestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TypesQuestion extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25|unique:type_questions,spanish',
        'main_record.english'       => 'required|min:3|max:25|unique:type_questions,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'TypeQuestion.index');
        $this->manage_title = __('Manage') . ' ' . __('Type Question');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.types_question.form';
        $this->view_table = 'livewire.types_question.table';
        $this->view_list = 'livewire.types_question.list';
        $this->main_record = new TypeQuestion();

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Type Question');

        return view('livewire.index', [
            'records' => TypeQuestion::TypeQuestion($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new TypeQuestion();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:type_questions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:type_questions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:type_questions,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:type_questions,english';

        $this->validate();
        $this->main_record->save();

        $this->close_store('Type Question');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(TypeQuestion $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Type Question');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(TypeQuestion $record)
    {
        $this->delete_record($record, __('Type Question') . ' ' . __('Deleted Successfully!!'));
    }
}

