<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Vehicles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];



    protected $rules = [
        'main_record.location_id'           =>'required|exists:locations,id',
        'main_record.vin'                   =>'required|min:17|max:17',
        'main_record.make'                  =>'required',
        'main_record.model'                 =>'required',
        'main_record.model_year'            =>'required',
        'main_record.product_type'          =>'required',
        'main_record.body'                  =>'required',
        'main_record.trim'                  =>'required',
        'main_record.series'                =>'required',
        'main_record.drive'                 =>'required',
        'main_record.engine_cylinders'      =>'required',
        'main_record.number_of_doors'       =>'required',
        'main_record.number_of_seat_rows'   =>'required',
        'main_record.number_of_seats'       =>'required',
        'main_record.steeering'             =>'required',
        'main_record.engine_displacement'   =>'required',
        'main_record.engine_power_kw'       =>'required',
        'main_record.engine_power_hp'       =>'required',
        'main_record.fuel_type_primary'     =>'required',
        'main_record.fuel_type_secondary'   =>'required',
        'main_record.engine_model'          =>'required',
        'main_record.transmission'          =>'required',
        'main_record.transmission_full'     =>'required',
        'main_record.number_of_gears'       =>'required',
        'main_record.color_exterior_id'     =>'nullable',
        'main_record.color_interior_id'     =>'nullable',
        'main_record.description'           =>'nullable',
        'main_record.price'                 =>'nullable',
        'main_record.slug'                  =>'nullable',
        'main_record.miles'                 =>'nullable',
        'main_record.available'             =>'nullable',
        'main_record.show'                  =>'nullable',
        'main_record.manufacturer'          =>'nullable',
        'main_record.vehicle_id'            =>'nullable',
    ];

    public $locations,$location_id;
    public $available;
    public $show;
    public $show_locations = true;
    public $show_form = false;

    public $vin_number = '4T1B61HK9JU514132';
    public $error_message = null;

    public function mount()
    {
        $this->authorize('hasaccess', 'vehicles.index');
        $this->manage_title     = __('Manage') . ' ' . __('Vehicles');
        $this->search_label     = __('Make,Model,Year....');
        $this->view_form        = 'livewire.vehicles.form';
        $this->view_table       = 'livewire.vehicles.table';
        $this->view_list        = 'livewire.vehicles.list';
        $this->view_search      = 'livewire.vehicles.search';
        $this->view_crud_modal  = 'livewire.vehicles.modal_form';


        $this->main_record  = new Vehicle();
        $this->locations    = Auth::user()->locations()->get();
        $this->show_locations = $this->locations->count();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Vehicle')
                                                            : __('Create') . ' ' . __('Vehicle');


        $records = Vehicle::paginate($this->pagination);
        return view('livewire.index',compact('records'));

    }

    /**
     * Busca el vehiculo con VIN
     */

     public function search_vin(){
        $this->reset('available', 'show','error_message','show_form');

        $this->main_record = new Vehicle();
        if (strlen($this->vin_number) != 17) return;
        $this->show_form =true;

        $this->vin_number = strtoupper($this->vin_number);
        $this->vehicle_record = Vehicle::Vin($this->vin_number)->first();
        if(!$this->vehicle_record){
            $this->error_message= 'Implementar búsqueda con la API';
            return;
        }
        $this->main_record = $this->vehicle_record;
        $this->error_message= 'Vehículo ya existe';
     }

    public function resetInputFields()
    {
        $this->reset('available', 'show','vin_number');
        $this->main_record = new Vehicle();
        $this->resetErrorBag();
    }

    /*+-----------------+
      | Guarda Registro |
      +-----------------+
    */

    public function store()
    {
        $this->validate();

        $this->main_record->available = $this->available ? 1 : 0;
        $this->main_record->show = $this->show ? 1 : 0;

        $this->main_record->save();

        $this->close_store('Vahicle');
    }

    /*+------------------------------+
      | Lee Registro Editar o Borar  |
      +------------------------------+
    */

    public function edit(Vehicle $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->available    = $record->available;
        $this->show         = $record->show;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Vehicle $record)
    {
        $this->delete_record($record, __('Vehicle') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }


}

