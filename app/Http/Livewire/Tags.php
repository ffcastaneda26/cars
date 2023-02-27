<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Tag;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Tags extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25|unique:tags,spanish',
        'main_record.english'       => 'required|min:3|max:25|unique:tags,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'tags.index');
        $this->manage_title = __('Manage') . ' ' . __('Tags');
        $this->search_label = __('Tag');
        $this->view_form    = 'livewire.tags.form';
        $this->view_table   = 'livewire.tags.table';
        $this->view_list    = 'livewire.tags.list';
        $this->main_record  = new Tag();
    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Tag')
                                                            : __('Create') . ' ' . __('Tag');

        $records = Tag::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);

        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Tag();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:tags,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:tags,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:tags,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:tags,english';

        $this->validate();
        $this->close_store('Tag');
    }

    /*+------------------------------+
      | Lee Registro Editar o Borar  |
      +------------------------------+
    */

    public function edit(Tag $record)
    {
        $this->editRecord($record);

    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Tag $record)
    {
        $this->delete_record($record, __('Tag') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
