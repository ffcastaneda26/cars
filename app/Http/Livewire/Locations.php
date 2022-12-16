<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Locations extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.dealer_id'         => 'required|exists:dealers,id',
        'main_record.name'              => 'required|min:5|max:150',
        'main_record.email'             => 'required|email|max:100',
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

    public $town_state, $zipcode, $active, $logotipo;
    public $dealers,$dealer_id;
    public $dealer;
    public $show_dealers = true;

    public function mount()
    {
        $this->authorize('hasaccess', 'locations.index');
        $this->manage_title = __('Manage') . ' ' . __('Locations');
        $this->search_label = __('Location');
        $this->view_form    = 'livewire.locations.form';
        $this->view_table   = 'livewire.locations.table';
        $this->view_list    = 'livewire.locations.list';
        $this->main_record  = new Location();
        if(Auth::user()->isAdmin()){
            $this->dealers      = Auth::user()->dealers()->get();
            $this->show_dealers = true;
        }else{
            $this->dealers = Auth::user()->dealers;
            $this->dealer = Auth::user()->dealers->first();

            $this->main_record->dealer_id = $this->dealer->id;
            $this->show_dealers = false;
        }

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Location')
                                                            : __('Create') . ' ' . __('Location');

        if(Auth::user()->isAdmin()){
            $this->allow_create = true;
            $records = Location::Name($this->search)
                                    ->orderby($this->sort,$this->direction)
                                    ->paginate($this->pagination);
        }

        $this->allow_create =  $this->dealer->package->locations_allowed > $this->dealer->locations->count();

        if(Auth::user()->isManager()){
            $this->main_record->dealer_id = $this->dealer->id;
            $records = $this->dealer->locations()->Name($this->search)->orderby($this->sort,$this->direction)->paginate($this->pagination);
        }

        return view('livewire.index',compact('records'));

    }

    public function resetInputFields()
    {
        $this->reset('town_state', 'zipcode', 'active', 'logotipo');
        $this->main_record = new Location();
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

        if($this->logotipo){
            $Image = $this->logotipo->Store('public/locations');
            $this->main_record->logotipo = $Image;
        }
        $this->main_record->save();

        if ($this->zipcode) {
            $this->main_record->zipcode = $this->zipcode;
            $this->main_record->save();
        }

        $this->main_record->users()->detach(Auth::user());
        $this->main_record->users()->attach(Auth::user());

        $this->close_store('Location');
    }

    /*+------------------------------+
      | Lee Registro Editar o Borar  |
      +------------------------------+
    */

    public function edit(Location $record)
    {
        $this->editRecord($record);
        $this->active       = $record->active;
        $this->read_town_state($this->main_record->zipcode);
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Location $record)
    {
        $record->users()->detach(Auth::user());
        $this->delete_record($record, __('Location') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}

