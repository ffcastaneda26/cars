<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dealers extends Component
{
    public function render()
    {
        return view('livewire.dealers');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Dealer;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
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
    public $town_state, $zipcode, $active, $logotipo;


    protected $rules = [
        'main_record.name'              => 'required|min:5|max:150',
        'main_record.email'             => 'required|email|max:60',
        'main_record.phone'             => 'required|digits:10',
        'main_record.address'           => 'required|min:5|max:100',
        'main_record.zipcode'           => 'required|digits:5|exists:zipcodes,zipcode',
        'main_record.website'           =>'nullable',
        'main_record.logotipo'          =>'nullable',
        'main_record.latitude'          =>'nullable',
        'main_record.longitude'         =>'nullable',
        'main_record.position'          =>'nullable',
        'main_record.active'            =>'nullable',
        'main_record.complete_address'  =>'nullable',
    ];

    public function mount()
    {
        //$this->authorize('hasaccess', 'Dealers.index');
        $this->manage_title = __('Manage') . ' ' . __('Dealers');
        $this->search_label = __('Dealer');
        $this->view_form    = 'livewire.dealer.form';
        $this->view_table   = 'livewire.dealer.table';
        $this->view_list    = 'livewire.dealer.list';
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


        if(Auth::user()->isAdmin()){
            $records = Dealer::Name($this->search)->paginate($this->pagination);
        }

        if(Auth::user()->isManager()){

            $records = Auth::user()->Dealers()->Dealer($this->search)->paginate($this->pagination);
        }

        return view('livewire.index',compact('records'));
    }

    public function resetInputFields()
    {
        $this->reset('town_state', 'zipcode', 'active', 'logotipo');
        $this->main_record = new Dealer();
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
            $Image = $this->logotipo->Store('public/dealers');
            $this->main_record->logotipo = $Image;
        }
        $this->main_record->save();

        if ($this->zipcode) {
            $this->main_record->zipcode = $this->zipcode;
            $this->main_record->save();
        }

        if(Auth::user()->isManager()){
            Auth::user()->dealers()->sync($this->main_record);
        };

        $this->close_store('Dealer');
    }

/*+------------------------------+
 | Lee Registro Editar o Borar  |
 +------------------------------+
 */

    public function edit(Dealer $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->active       = $record->active;
        $this->read_town_state($this->main_record->zipcode);




        $this->create_button_label = __('Update') . ' ' . __('Dealer');
        $this->openModal();
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
