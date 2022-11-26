<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Permissions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'          => 'required|min:3|max:100|unique:permissions,name',
        'main_record.slug'          => 'required|min:3|max:100|unique:permissions,slug',
        'main_record.spanish'       => 'required|min:3|unique:permissions,spanish',
        'main_record.english'       => 'required|min:3|unique:permissions,english',
    ];


    public function mount()
    {
        $this->authorize('hasaccess', 'permission.index');
        $this->manage_title = __('Manage') . ' ' . __('Permissions');
        $this->search_label = __('Permission');
        $this->view_form = 'livewire.permissions.form';
        $this->view_table = 'livewire.permissions.table';
        $this->view_list = 'livewire.permissions.list';
        $this->main_record = new Permission();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Permission')
                                                            : __('Create') . ' ' . __('Permission');

        return view('livewire.index', [
            'records' => Permission::Permission($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Permission();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:3|max:100|unique:permissions,name,{$this->main_record->id}"
                                                                    : 'required|min:3|max:100|unique:permissions,name';
        $this->rules['main_record.slug'] = $this->main_record->id ? "required|min:3|max:100|unique:permissions,slug,{$this->main_record->id}"
                                                                    : 'required|min:3|max:100|unique:permissions,slug';

       $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|unique:permissions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|unique:permissions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|unique:permissions,english,{$this->main_record->id}"
                                                                     : 'required|min:3|unique:permissions,english';

        $this->validate();
        $this->main_record->save();
        $this->close_store('Permission');
    }

/*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Permission $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Permission');
        $this->openModal();
    }

/*+------------------------------+
 | Elimina Registro             |
 +------------------------------+
 */
    public function destroy(Permission $record)
    {
        $this->delete_record($record, __('Permission') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }
}
