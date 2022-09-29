<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Genders extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:50|unique:genders,spanish',
        'main_record.english'       => 'required|min:5|max:50|unique:genders,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'Gender.index');
        $this->manage_title = __('Manage') . ' ' . __('Genders');
        $this->search_label = __('Gender');
        $this->view_form    = 'livewire.genders.form';
        $this->view_table   = 'livewire.genders.table';
        $this->view_list    = 'livewire.genders.list';
        $this->main_record  = new Gender();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Gender')
                                                            : __('Create') . ' ' . __('Gender');

        return view('livewire.index', [
            'records' => Gender::Gender($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Gender();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:50|unique:geneders,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:50|unique:geneders,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:50|unique:geneders,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:50|unique:geneders,english';

        $this->validate();
        $this->close_store('Gender');
    }

/*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Gender $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Gender');
        $this->openModal();
    }

    /*+------------------------------+
 | Elimina Registro             |
 +------------------------------+
 */
    public function destroy(Gender $record)
    {
        $this->delete_record($record, __('Gender') . ' ' . __('Deleted Successfully!!'));
    }
}
