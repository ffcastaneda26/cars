<?php

namespace App\Http\Livewire;

use App\Models\Gender;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Question;
use App\Models\Ethnicity;
use App\Models\Promotion;
use App\Traits\UserTrait;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    public $ethnicities =null;
    public $genders;
    public $city_town = null;
    public $email;
    public $question_id = [];

    protected $rules = [
        'main_record.first_name'        => 'required|min:3|max:40',
        'main_record.last_name'         => 'required|min:3|max:40',
        'main_record.email'             => 'nullable|email|max:100|unique:customers, email',
        'main_record.phone'             => 'required|digits:10|unique:customers, phone',
        'main_record.address'           => 'required',
        'main_record.zipcode'           => 'required|exists:zipcodes,zipcode',
        'main_record.gender_id'         => 'required|exists:genders,id',
        'main_record.ethnicity_id'      => 'required|exists:ethnicities,id',
        'main_record.age'               => 'required|numeric|max:99|min:18',
        'main_record.agree_be_rules'    => 'required',
        'main_record.agree_be_legal_age'=> 'required',
    ];

    public function mount()
    {
        $this->main_record = new Customer();
        if (App::isLocale('en')) {
            $this->ethnicities  = Ethnicity::orderby('english')->get();
            $this->genders      = Gender::orderby('english')->get();
            $this->promotions    = Promotion::where('active', 1)->orderby('english')->get();
        } else {
            $this->ethnicities  = Ethnicity::orderby('spanish')->get();
            $this->genders      = Gender::orderby('spanish')->get();
            $this->promotions    = Promotion::where('active', 1)->orderby('spanish')->get();
        }
    }

/*+---------------------------------+
    | Regresa Vista con Resultados    |
    +---------------------------------+
*/

    public function render()
    {
        return view('livewire.customer_controller.index', [
        'records' => Customer::paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Customer();
        $this->reset('email');
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

        $this->rules['main_record.phone'] = $this->main_record->id ? "required|digits:10|unique:customers,phone,{$this->main_record->id}"
                                                                   : 'required|digits:10|unique:customers,phone';
        $this->rules['main_record.email'] = $this->main_record->id ? "nullable|email|unique:customers,email,{$this->main_record->id}"
                                                                   : 'nullable|email|unique:customers,email';

        $this->validate();

        // Traemos Correo
        if($this->email){
            $customer_record = Customer::where('email',$this->email)->first();
            if($customer_record){ // Encontró un registro con ese correo
                if($this->record_id ){ // Está editando
                    if($customer_record->email != $this->email){
                        $this->validator->errors()->add('email', 'Email has already been taken.');
                    }
                }else{
                    $this->validator->errors()->add('email', 'Email has already been taken.');
                }
            }
        }
        $this->main_record->email= $this->email;
        $this->main_record->save();
        $this->close_store('Customer');
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}