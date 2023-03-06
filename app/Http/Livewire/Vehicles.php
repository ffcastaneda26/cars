<?php


namespace App\Http\Livewire;


use App\Models\Make;
use App\Models\Style;
use App\Models\Dealer;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Traits\VariablesTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Modell;
use App\Traits\VehicleTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Vehicles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use VariablesTrait;
    use VehicleTrait;

    public $stock;
    public $available = 1;
    public $show = 1;

    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.dealer_id'     =>'required|exists:dealers,id',
        'main_record.make_id'       =>'required|exists:makes,id',
        'main_record.model_id'      =>'required|exists:models,id',
        'main_record.style_id'      =>'required|exists:styles,id',
        'main_record.model_year'    =>'required|digits:4',
        'main_record.description'   =>'nullable',
        'main_record.available'     =>'nullable',
        'main_record.show'          =>'nullable',
        'main_record.stock'         =>'required',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'styles.index');
        $this->manage_title = __('Manage') . ' ' . __('Vehicles');
        $this->search_label = __('Style');
        $this->view_form    = 'livewire.vehicles.form';
        $this->view_table   = 'livewire.vehicles.table';
        $this->view_list    = 'livewire.vehicles.list';
        $this->view_search  = 'livewire.vehicles.search';

        $this->dealersList  = Dealer::select('id','name')->orderby('name')->get();
        $this->makesList    = Make::orderby('name')->get();
        $this->stylesList   = Style::orderby('name')->get();
        $this->main_record  = new Vehicle();

        // $this->view_crud_modal  = 'livewire.vehicles.modal_form';


    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Vehicle')
                                                            : __('Create') . ' ' . __('Vehicle');

       $this->yearsList_search = $this->fill_model_year_combo('model_year');
       $this->fill_combos_to_search();

        $records = Vehicle::ModelYear($this->search_model_year)
                            ->Brand($this->search_make_id)
                            ->Model($this->search_model_id)
                            ->StyleSearch($this->search_style_id)
                            ->Stock($this->stock_search)
                            ->orderby($this->sort,$this->direction)->paginate(10);

                        return view('livewire.index',compact('records'));
    }

    public function read_models(){
        if($this->main_record->make_id){
            $this->make = Make::findOrFail($this->main_record->make_id);
            $this->modelsList = $this->make->models()->get();
        }
    }

    public function resetInputFields()
    {
        $this->main_record = new Vehicle();
        $this->reset('stock','available','show','record_id');
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        // Si es nuevo se le crea el stock
        if(!$this->record_id && $this->main_record->dealer_id){
            $continue = true;
            while($continue){
                $random_stock_number = str_pad($this->main_record->dealer_id, 3, "0", STR_PAD_LEFT) . '-' .  rand(1,10000);
                $exists_stock_number = Vehicle::Stock($random_stock_number)->first();
                $continue = $exists_stock_number;
            }
            $this->main_record->stock =  $random_stock_number;
        }

        $this->validate();
        $this->main_record->available = $this->available ? 1 : 0;
        $this->main_record->show = $this->show ? 1 : 0;
        $this->main_record->save();
        $this->close_store('Vehicle');
        $this->fill_combos_to_search();
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Vehicle $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->available    = $this->main_record->available;
        $this->show         = $this->main_record->show;
        $this->stock        = $this->main_record->stock;
        $this->read_models();
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Vehicle $record)
    {
        $this->delete_record($record, __('Vehicle') . ' ' . __('Deleted Successfully!!'));
    }

}


