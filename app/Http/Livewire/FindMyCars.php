<?php


namespace App\Http\Livewire;


use App\Models\Make;
use App\Models\Style;
use App\Models\Dealer;
use App\Models\Modell;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Requirement;
use App\Traits\VehicleTrait;
use Livewire\WithPagination;
use App\Traits\VariablesTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FindMyCars extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use VariablesTrait;


    protected $rules = [
        'main_record.name'          =>'required|min:3|max:80',
        'main_record.phone'         =>'required|digits:10',
        'main_record.model_year'    =>'required|digits:4',
        'main_record.make_id'       =>'required|exists:makes,id',
        'main_record.model_id'      =>'required|exists:models,id',
        'main_record.max_miles'     =>'required|numeric',
        'main_record.downpayment'   =>'required|numeric',
        'main_record.type_financing'=>'required',
        'main_record.details'   =>'nullable',
    ];



    public function mount()
    {
        $this->manage_title = __('Register') . ' ' . __('Requirement');
        $this->makesList    = Make::select('id','name')->orderby('name')->get();
        $this->main_record  = new Requirement();
        $this->message = null;

    }

    public function render()
    {

        $this->allow_save = $this->main_record->name
                            && $this->main_record->phone
                            && $this->main_record->model_year
                            && $this->main_record->make_id
                            && $this->main_record->model_id
                            && $this->main_record->max_miles
                            && $this->main_record->downpayment
                            && $this->main_record->type_financing
                            && $this->main_record->details;


        return view('livewire.requirements.find-my-cars');

    }

    public function read_make(){
        if($this->main_record->make_id){
            $this->make = Make::findOrFail($this->main_record->make_id);
        }
    }

    public function resetInputFields()
    {
        $this->main_record = new Requirement();
        $this->reset('record_id');
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->save();
        $this->close_store('Requirement');
        $this->message = __('Thank you for your request');
    }

}
