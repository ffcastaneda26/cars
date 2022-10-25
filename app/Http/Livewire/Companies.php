<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Zipcode;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Permission;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Companies extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];
    public $town_state, $zipcode, $active, $logotipo;


    protected $rules = [
        'main_record.name'      => 'required|min:5|max:100',
        'main_record.email'     => 'required|email|max:50',
        'main_record.phone'     => 'required|digits:10',
        'main_record.address'   => 'required|min:5|max:100',
        'main_record.latitude'   => 'nullable',
        'main_record.longitude'  => 'nullable',
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
        $this->reset('town_state', 'zipcode', 'active', 'logotipo');
        $this->main_record = new Company();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;

        if($this->logotipo){
            $Image = $this->logotipo->Store('public/images/companies');
            $this->main_record->logotipo = $Image;
        }
        $this->main_record->save();

        if ($this->zipcode) {
            $this->main_record->zipcode = $this->zipcode;
            $this->main_record->save();
        }
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

     /**
     * Lee el zipcode para tomar población y estado
     */
    public function read_zipcode(){
        $this->town_state ='';
        $zipcode = Zipcode::where('zipcode','=',$this->zipcode)->first();
        if($zipcode){
            $this->town_state = $zipcode->town . ',' . $zipcode->state;
        }else{
            $this->town_state = __('Zipcode does not Exists');
        }
    }
}
