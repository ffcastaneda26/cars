<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Traits\FilesTrait;
use App\Traits\ZipCodeTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Companies extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithFileUploads;

    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;
    use FilesTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'      => 'required|min:3|max:150',
        'main_record.email'     => 'nullable|email|max:100',
        'main_record.phone'     => 'required|digits:10',
        'main_record.address'   => 'required',
        'main_record.zipcode'   => 'required|digits:5|exists:zipcodes,zipcode',
        'main_record.active'    => 'nullable',
        'main_record.logotipo'  => 'nullable'
    ];

    public $active;
    public $file_path;


    public function mount()
    {
        $this->authorize('hasaccess', 'companies.index');
        $this->manage_title = __('Manage') . ' ' . __('Companies');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.companies.form';
        $this->view_table = 'livewire.companies.table';
        $this->view_list = 'livewire.companies.list';
        $this->main_record = new Company();
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

        if($this->main_record->zipcode){
            $this->read_town_state($this->main_record->zipcode);
        }
        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;

        if($this->file_path){
            $this->validate([
                'file_path'    => 'image|max:2048',
            ]);
            $logotipo = $this->store_main_record_file($this->file_path,'companies',true);

            $this->main_record->logotipo = $logotipo;
        }

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
        $this->active       = $record->active;
        $this->read_town_state($this->main_record->zipcode);
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Company $record)
    {
        $this->delete_record($record, __('Company') . ' ' . __('Deleted Successfully!!'));
    }

    /** Lee Zipcode */
    public function read_zipcode(){

        $this->read_town_state($this->main_record->zipcode);
    }

}


