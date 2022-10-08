<?php

namespace App\Http\Livewire;

use App\Models\Competidor;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Traits\ZipCodeTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;

class competidors extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    protected $listeners = ['destroy'];



    public $agree_be_legal_age   = false;
    public $agree_read_rules    = false;

    protected $rules = [
        'main_record.first_name'        => 'required|min:3|max:40',
        'main_record.last_name'         => 'required|min:3|max:40',
        'main_record.email'             => 'nullable|email|max:100',
        'main_record.phone'             => 'required|digits:10',
        'main_record.address'           => 'nullable',
        'main_record.zipcode'           => 'nullable|digits:5|exists:zipcodes,zipcode',
        'main_record.birthday'          => 'nullable',
        'main_record.age'               => 'nullable|digits:2|min:18|max:99',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'competidors.index');
        $this->manage_title = __('Manage') . ' ' . __('Competidors');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.competidors.form';
        $this->view_table = 'livewire.competidors.table';
        $this->view_list = 'livewire.competidors.list';
        $this->main_record = new Competidor();
        $this->allow_save = false;
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Competidor');

        $this->allow_save = $this->agree_be_legal_age && $this->agree_read_rules;
        return view('livewire.index', [
            'records' => Competidor::Competidor($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Competidor();
        $this->reset('search_label','agree_be_legal_age','agree_read_rules');
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {

        $this->validate();

        if($this->allow_save){
            $this->main_record->save();
            $this->close_store('Competidor');
        }
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Competidor $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Competidor $record)
    {
        $this->delete_record($record, __('Competidor') . ' ' . __('Deleted Successfully!!'));
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}

