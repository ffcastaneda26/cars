<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Question;
use App\Models\TypeQuestion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;

class Questions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    public $active;
    public $types_questions=null;
    public $max_order;

    protected $rules = [
        'main_record.spanish'           => 'required|min:5|max:100',
        'main_record.english'           => 'required|min:5|max:100',
        'main_record.order'             => 'required',
        'main_record.type_question_id'  => 'required|exists:type_questions,id',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'questions.index');
        $this->manage_title = __('Manage') . ' ' . __('Questions');
        $this->search_label = __('Question');
        $this->view_form = 'livewire.questions.form';
        $this->view_table = 'livewire.questions.table';
        $this->view_list = 'livewire.questions.list';
        $this->main_record = new Question();
        if (App::isLocale('en')) {
            $this->types_questions = TypeQuestion::orderby('english')->get();
        } else {
            $this->types_questions = TypeQuestion::orderby('spanish')->get();
        }
        $this->max_order = Question::count();

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Question');

        if(!$this->updating_record){
            $this->max_order++;
        }

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

        $this->validate();

        $max_order =  $this->main_record->order;
        if($this->updating_record){
            $records_to_reorder = Question::where('order','>=', $max_order)
                                            ->where('id','<>',$this->main_record->id)
                                            ->orderby('order')
                                            ->get();
        }else{
            $records_to_reorder = Question::where('order','>=', $max_order)
                                    ->orderby('order')
                                    ->get();
        }

        $this->main_record->save();

        if($records_to_reorder->count()){
            $this->reorder_records($records_to_reorder,$max_order);
        }
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
        $this->updating_record = true;

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


    /*+----------------------+
      | Reasigna el Orden    |
      +----------------------+
    */
    private function reorder_records($records,$start=0){
        foreach($records as $record){
            $start++;
            $record->order = $start;
            $record->save();
        }
    }
}

