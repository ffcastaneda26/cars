<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\TypeQuestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Questions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    public $active;
    public $types_questions=null;

    protected $rules = [
        'main_record.spanish'           => 'required|min:5|max:100|unique:questions,spanish',
        'main_record.english'           => 'required|min:5|max:100|unique:questions,english',
        'main_record.type_question_id'  => 'required|exists:type_questions,id',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'questions.index');
        $this->manage_title = __('Manage') . ' ' . __('Question');
        $this->search_label = __('Question');
        $this->view_form = 'livewire.questions.form';
        $this->view_table = 'livewire.questions.table';
        $this->view_list = 'livewire.questions.list';
        $this->main_record = new Question();
        $this->types_questions = TypeQuestion::all();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Question');

        return view('livewire.index', [
            'records' => Question::Question($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Question();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:100|unique:questions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:100|unique:questions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:100|unique:questions,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:100|unique:questions,english';

        $this->validate();
        $this->main_record->save();

        $this->close_store('Question');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Question $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Question');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Question $record)
    {
        $this->delete_record($record, __('Question') . ' ' . __('Deleted Successfully!!'));
    }
}

