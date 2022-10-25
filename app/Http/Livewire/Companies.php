<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Permission;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Companies extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];
    public $town_state, $zipcode, $active, $logotipo;


    protected $rules = [
        'main_record.name'      => 'required|min:5|max:100|unique:companies,name',
        'main_record.email'     => 'required|digits:10',
        'main_record.phone'     => 'required|email|max:100',
        'main_record.address'   => 'required|min:5',
        'main_record.active'    => 'nullable'
    ];

    public function mount()
    {
        //$this->authorize('hasaccess', 'companies.index');
        $this->manage_title = __('Manage') . ' ' . __('Companies');
        $this->search_label = __('Companies');
        $this->view_form    = 'livewire.companies.form';
        $this->view_table   = 'livewire.companies.table';
        $this->view_list    = 'livewire.companies.list';
        $this->main_record  = new Company();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Company')
                                                            : __('Create') . ' ' . __('Company');

        return view('livewire.index', [
            'records' => Company::Company($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Company();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:5|max:100|unique:companies,name,{$this->main_record->id}"
                                                                    : 'required|min:5|max:100|unique:companies,name';
        $this->validate();
        $this->main_record->save();
        $this->close_store('Company');
    }

/*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Company $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Company');
        $this->openModal();
    }

/*+------------------------------+
 | Elimina Registro             |
 +------------------------------+
 */
    public function destroy(Company $record)
    {
        $this->delete_record($record, __('Company') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }
}
