<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Roles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'          => 'required|min:5|max:50|unique:roles,name',
        'main_record.spanish'       => 'required|min:5|unique:roles,spanish',
        'main_record.english'       => 'required|min:5|unique:roles,english',
        'main_record.full_access'   => 'nullable',
    ];


    public function mount()
    {
        $this->authorize('hasaccess', 'role.index');
        $this->manage_title = __('Manage') . ' ' . __('Roles');
        $this->search_label = __('Role');
        $this->view_form = 'livewire.roles.form';
        $this->view_table = 'livewire.roles.table';
        $this->view_list = 'livewire.roles.list';
        $this->main_record = new Role();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Role')
                                                            : __('Create') . ' ' . __('Role');

        return view('livewire.index', [
            'records' => Role::Role($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Role();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name']    = $this->main_record->id ? "required|min:5|max:50|unique:roles,name,{$this->main_record->id}"
                                                                    : 'required|min:5|max:50|unique:roles,name';
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|unique:roles,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|unique:roles,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|unique:roles,english,{$this->main_record->id}"
                                                                     : 'required|min:5|unique:roles,english';

        $this->validate();
        $this->close_store('Role');
    }

/*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Role $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Role');
        $this->openModal();
    }

/*+------------------------------+
 | Elimina Registro             |
 +------------------------------+
 */
    public function destroy(Role $record)
    {
        $this->delete_record($record, __('Role') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }
}
