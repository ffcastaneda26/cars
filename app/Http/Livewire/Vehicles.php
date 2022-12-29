<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Color;
use App\Models\Dealer;
use App\Models\LocationUser;
use App\Models\TemporaryVehicle;
use App\Models\Vehicle;
use App\Traits\ApiVehiclesTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Vehicles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ApiVehiclesTrait;
    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.location_id'               =>'required|exists:locations,id',
        'main_record.vin'                       =>'required|min:17|max:17',
        'main_record.interior_color_id'         =>'required|exists:colors,id',
        'main_record.exterior_color_id'         =>'required|exists:colors,id',
        'main_record.price'                     =>'nullable',
        'main_record.miles'                     =>'required|integer',
        'main_record.make'                      =>'required',
        'main_record.model'                     =>'required',
        'main_record.vehicle_id'                =>'nullable',
        'main_record.model_year'                =>'required',
        'main_record.product_type'              =>'nullable',
        'main_record.body'                      =>'nullable',
        'main_record.series'                    =>'nullable',
        'main_record.drive'                     =>'nullable',
        'main_record.engine_displacement'       =>'nullable',
        'main_record.engine_power_kw'           =>'nullable',
        'main_record.engine_power_hp'           =>'nullable',
        'main_record.fuel_type_primary'         =>'nullable',
        'main_record.transmission'              =>'nullable',
        'main_record.number_of_gears'           =>'nullable',
        'main_record.manufacturer'              =>'nullable',
        'main_record.manufacturer_address'      =>'nullable',
        'main_record.plant_city'                =>'nullable',
        'main_record.plant_company'             =>'nullable',
        'main_record.plant_country'             =>'nullable',
        'main_record.production_stopped'        =>'nullable',
        'main_record.engine_compression_ratio'  =>'nullable',
        'main_record.engine_cylinder_bore_mm'   =>'nullable',
        'main_record.engine_cylinders'          =>'nullable',
        'main_record.engine_cylinders_position' =>'nullable',
        'main_record.engine_position'           =>'nullable',
        'main_record.engine_rpm'                =>'nullable',
        'main_record.engine_stroke_m'           =>'nullable',
        'main_record.engine_torque_rpm'         =>'nullable',
        'main_record.engine_turbine'            =>'nullable',
        'main_record.valve_train'               =>'nullable',
        'main_record.fuel_capacity'             =>'nullable',
        'main_record.fuel_consumption_combined' =>'nullable',
        'main_record.fuel_consumption_extra_Urba'=>'nullable',
        'main_record.fuel_consumption_Urban'     =>'nullable',
        'main_record.fuel_system'               =>'nullable',
        'main_record.valves_per_cylinder'       =>'nullable',
        'main_record.number_of_doors'           =>'nullable',
        'main_record.number_of_seat_rows'       =>'nullable',
        'main_record.number_of_seats'           =>'nullable',
        'main_record.front_brakes'              =>'nullable',
        'main_record.rear_brakes'               =>'nullable',
        'main_record.steeering'                 =>'nullable',
        'main_record.steering_tyype'            =>'nullable',
        'main_record.rear_suspension'           =>'nullable',
        'main_record.front_suspension'          =>'nullable',
        'main_record.drag_coefficient'          =>'nullable',
        'main_record.wheel_rims_size'           =>'nullable',
        'main_record.wheel_rims_size'           =>'nullable',
        'main_record.wheel_size'                =>'nullable',
        'main_record.wheel_size_array'          =>'nullable',
        'main_record.wheelbase'                 =>'nullable',
        'main_record.wheel_base_array'          =>'nullable',
        'main_record.height'                    =>'nullable',
        'main_record.lenght'                    =>'nullable',
        'main_record.width'                     =>'nullable',
        'main_record.width_including mirrors'   =>'nullable',
        'main_record.track_front'               =>'nullable',
        'main_record.track_rear'                =>'nullable',
        'main_record.acceleration'              =>'nullable',
        'main_record.max_speed'                 =>'nullable',
        'main_record.minimum_turning_circle'    =>'nullable',
        'main_record.minimum_trunk_capacity'    =>'nullable',
        'main_record.weight_empty_kg'           =>'nullable',
        'main_record.abs'                       =>'nullable',
        'main_record.check_digit'               =>'nullable',
        'main_record.sequential_number'         =>'nullable',
        'main_record.trim'                      =>'nullable',
        'main_record.fuel_type_secondary'       =>'nullable',
        'main_record.engine_model'              =>'nullable',
        'main_record.transmission_full'         =>'nullable',
        'main_record.plant_state'               =>'nullable',
        'main_record.market'                    =>'nullable',
        'main_record.made_date'                 =>'nullable',
        'main_record.production_started'        =>'nullable',
        'main_record.available'                 =>'nullable',
        'main_record.show'                      =>'nullable',
        'main_record.description'               =>'nullable',
        'main_record.slug'                      =>'nullable',

    ];

    public $vehicle_record = null;
    public $locations,$location_id;
    public $colors=null;
    public $available;
    public $show;
    public $premium;

    public $show_locations = true;
    public $show_form = false;
    public $exists_in_vehicles=false;
    public $source=null;
    public $sources = ['vehicles','temporary','api_vehicles'];
    public $vin_number;
    public $dealer;

    // public $vin_number = '4T1B61HK9JU514132';

    public $allow_change_premium = true;


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
        $this->view_common_table= 'livewire.vehicles.crud_table';
        $this->main_record      = new Vehicle();
        $this->colors           = Color::all();
        $this->locations        = Auth::user()->locations()->get();

        if( $this->locations->count()==1){
            $this->main_record->location_id = $this->locations->first()->id;
        }

        $this->dealer = Auth::user()->dealers()->first();

        $this->max_premium_allowed  = $this->dealer->package->premium_tag_search;
        $this->allow_change_premium =  $this->dealer->premium_vehicles() <  $this->max_premium_allowed;
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->dealer = Dealer::findOrFail($this->dealer->id);
        $this->allow_save = $this->show_form;
        $this->allow_create = $this->dealer->can_create_vehicles();
        if($this->allow_create){
            $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Vehicle')
            : __('Create') . ' ' . __('Vehicle');
        }else{
            $this->create_button_label = '';
        }


        $user_locations= LocationUser::select('location_id')
                        ->Where('user_id',Auth::user()->id)
                        ->orderBy('location_id')
                        ->get()
                        ->toArray();

         $records = Vehicle::WhereIn('location_id',$user_locations)
                ->SearchFull($this->search)->orderby($this->sort,$this->direction)
                ->paginate(10);

        return view('livewire.index',compact('records'));

    }

    /**
     * Busca el vehiculo con VIN
     */

     public function search_vin(){

        $this->reset('available', 'show','error_message','show_form','exists_in_vehicles');

        if (!$this->main_record->location_id || strlen($this->vin_number) != 17) return;

        $this->show_form =true;
        $this->vin_number = strtoupper($this->vin_number);

        if($this->main_record->location_id){
            $bk_location_id = $this->main_record->location_id;
        }


        foreach($this->sources as $source){
            $this->source = $source;
            $this->vehicle_record = $this->searchVehicle($this->source ,$this->vin_number);
            if($this->vehicle_record) {
                break;
            }
        }

        // ¿Encontró el vehículo en algun lado?

        if (!$this->vehicle_record) {
            $this->error_message= __('Vehicle does not exists');
            $this->show_form = false;
            return;
        }

        // Pasa datos al registro principal
        $this->main_record = $this->vehicle_record;
        if($bk_location_id){
            $this->main_record->location_id = $bk_location_id;
        }


        // ¿Es de la misma sucursal?
        if($this->vehicle_record->location_id == $this->main_record->location_id){
            $this->main_record = $this->vehicle_record;
            return;
        }
        // ¿Es del mismo dealer per de diferente sucursal?
        if($this->vehicle_record->location->dealer_id == $this->main_record->location->dealer_id){
            if(Auth::user()->hasLocation($this->vehicle_record->location_id)){
                $this->error_message= __('Vehicle is in another location');
                $this->main_record = $this->vehicle_record;
                $this->main_record->location_id = $bk_location_id;
                return;
            }
            $this->error_message= __('Vehicle is in another location you can not manage it');
            $this->show_form = false;
            return;
        }

        if(!$this->vehicle_record){
            $this->error_message= __('Vehicle does not exists');

            $this->main_record = new Vehicle();
            $this->main_record->location_id = $bk_location_id;
            $this->vehicle_record = TemporaryVehicle::Vin($this->vin_number)->first();

            if(! $this->vehicle_record){
                $this->error_message= 'No está en vehículos temporales,buscar con API';
                $this->show_form = false;
                return;
            }

        }

     }


     // Buscar Vehículo con el VIN
     private function searchVehicle($source,$vin_number){

        if($source == 'vehicles'){
            return  Vehicle::Vin($vin_number)->first();
        }

        // TODO: Evaluar que pasa si lo encuentra en el TEMPORAL ¿Lo ctoma como vehículo o como temporal?
        if($source == 'temporary'){
            return  TemporaryVehicle::Vin($vin_number)->first();
        }

        if($source == 'api_vehicles'){
            dd($this->searchApiVin($vin_number,$this->main_record->location_id));

           return $this->searchApiVin($vin_number,$this->main_record->location_id);
        }


     }


    public function resetInputFields()
    {
        $this->reset('available', 'show','premium','vin_number');
        $this->main_record = new Vehicle();
        $this->allow_change_premium = Auth::user()->dealers->first()->vehicles->where('premium',1)->count() <  $this->max_premium_allowed;

        $this->resetErrorBag();
    }

    /*+-----------------+
      | Guarda Registro |
      +-----------------+
    */

    public function store()
    {
        $this->validate();

        $this->main_record->available   = $this->available  ? 1 : 0;
        $this->main_record->show        = $this->show       ? 1 : 0;
        $this->main_record->premium     = $this->premium    ? 1 : 0;

        if(strlen($this->main_record->price) < 1) $this->main_record->price=null;

        $this->main_record->save();
        // TODO: Validar que si está en el TEMPORAL se elimine


        $this->close_store('Vehicle');
    }

    /*+------------------------------+
      | Lee Registro Editar o Borar  |
      +------------------------------+
    */

    public function edit(Vehicle $record)
    {
        $this->main_record = null;
        $this->main_record = new Vehicle();

        $this->record_id    = null;
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->available    = $record->available;
        $this->show         = $record->show;
        $this->premium      = $record->premium;
        $this->vin_number   = $record->vin;
        $this->show_form    = true;
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

    /*+-----------------+
      | Cambia Premium  |
      +-----------------+
    */

    public function change_premium(Vehicle $vehicle){
        $vehicle->premium = !$vehicle->premium;
        $vehicle->save();
        $this->allow_change_premium =  Auth::user()->dealers()->first()->premium_vehicles() <  $this->max_premium_allowed;
    }
}

