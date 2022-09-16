<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Statuses extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:statuses,spanish',
        'main_record.short_spanish' => 'required|min:3|max:6|unique:statuses,short_spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:statuses,english',
        'main_record.short_english' => 'required|min:3|max:6|unique:statuses,short_english',
        'main_record.color'         => 'nullable',
        'main_record.text_color'    => 'nullable',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'status.index');
        $this->manage_title = __('Manage') . ' ' . __('Status');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.statuses.form';
        $this->view_table = 'livewire.statuses.table';
        $this->view_list = 'livewire.statuses.list';
        $this->main_record = new Status();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Status') : __('Create') . ' ' . __('Status');

        return view('livewire.index', [
            'records' => Status::Status($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Status();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:statuses,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:statuses,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:statuses,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:statuses,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:10|unique:statuses,short_spanish,{$this->main_record->id}"
                                                                      : 'required|min:3|max:6|unique:statuses,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:10|unique:statuses,short_english,{$this->main_record->id}"
                                                                            : 'required|min:3|max:6|unique:statuses,short_english';

        $this->validate();
        $this->close_store('Status');
    }

    /*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Status $record)
    {
        $this->main_record = $record;
        $this->create_button_label = __('Update') . ' ' . __('Status');
        $this->openModal();
    }

    /*+------------------------------+
 | Elimina Registro             |
 +------------------------------+
 */
    public function destroy(Status $record)
    {
        $this->delete_record($record, __('Status') . ' ' . __('Deleted Successfully!!'));
    }
}
