<?php

namespace App\Http\Livewire;

use App\Models\Dealer;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Package;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Dealers extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.name'      => 'required|min:3|max:150',
        'main_record.zipcode'   => 'required|exists:zipcodes,zipcode',
        'main_record.active'    =>'nullable',
    ];

    public $town_state, $zipcode, $active;
    public $packages;

    public function mount()
    {
        $this->authorize('hasaccess', 'dealers.index');
        $this->manage_title = __('Manage') . ' ' . __('Dealers');
        $this->search_label = __('Dealer');
        $this->view_form    = 'livewire.dealers.form';
        $this->view_table   = 'livewire.dealers.table';
        $this->view_list    = 'livewire.dealers.list';
        $this->main_record  = new Dealer();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Dealer')
                                                            : __('Create') . ' ' . __('Dealer');

      $records = Dealer::Name($this->search)->orderby($this->sort,$this->direction)->paginate($this->pagination);
      return view('livewire.index',compact('records'));

    }

    public function resetInputFields()
    {
        $this->reset('town_state', 'zipcode', 'active');
        $this->main_record = new Dealer();
        $this->resetErrorBag();
    }

    /*+-----------------+
      | Guarda Registro |
      +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;
        $this->main_record->save();
        $this->close_store('Dealer');
    }

    /*+------------------------------+
      | Lee Registro Editar o Borar  |
      +------------------------------+
    */

    public function edit(Dealer $record)
    {
        $this->editRecord($record);
        $this->active       = $record->active;
        $this->read_town_state($this->main_record->zipcode);
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Dealer $record)
    {
        $this->delete_record($record, __('Dealer') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}
