<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Coupon;
use App\Models\Gender;
use App\Models\Option;
use Livewire\Component;
use App\Models\Customer;
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
    public $option_id = [];
    public $gift_id = null;
    protected $rules = [
        'main_record.first_name'        =>  'required|min:3|max:40',
        'main_record.last_name'         =>  'required|min:3|max:40',
        'main_record.email'             =>  'nullable|email|unique:customers, email',
        'main_record.phone'             =>  'required|digits:10|unique:customers, phone',
        'main_record.address'           =>  'required',
        'main_record.zipcode'           =>  'required|exists:zipcodes,zipcode',
        'main_record.gender_id'         =>  'required|exists:genders,id',
        'main_record.ethnicity_id'      =>  'required|exists:ethnicities,id',
        'main_record.age'               =>  'required|numeric|max:99|min:18',
        'main_record.agree_be_rules'    =>  'required',
        'main_record.agree_be_legal_age'=>  'required',
        'option_id'                     =>  'required|exists:options,id', // ! Cuál opción es la que está validando?
        'gift_id'                       =>  'required|exists:gifts,id'
    ];

    public function mount()
    {
        $this->main_record = new Customer();
        if (App::isLocale('en')) {
            $this->ethnicities  = Ethnicity::orderby('english')->get();
            $this->genders      = Gender::orderby('english')->get();
            $this->promotion   = Promotion::where('active', 1)->orderby('english')->first();
        } else {
            $this->ethnicities  = Ethnicity::orderby('spanish')->get();
            $this->genders      = Gender::orderby('spanish')->get();
            $this->promotion    = Promotion::where('active', 1)->orderby('spanish')->first();
        }
    }

/*+---------------------------------+
    | Regresa Vista con Resultados    |
    +---------------------------------+
*/

    public function render()
    {
        // ! ¿Que pasa si no hay promociones activas?
        return view('livewire.customer_controller.index');
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
        if($this->main_record->email) {
            $customer_record = Customer::where('email',$this->main_record->email)->first();
            if($customer_record){ // Encontró un registro con ese correo
                if($this->record_id ){ // Está editando
                    if($customer_record->email != $this->main_record->email){
                        $this->validator->errors()->add('email', 'Email has already been taken.');
                    }
                }else{
                    $this->validator->errors()->add('email', 'Email has already been taken.');
                }
            }
        }

        $this->main_record->save();
        /* Ligamos con customer_promotions */
        $this->linkRecords($this->main_record);
        /* Agregamos la generacion del cupon  */
        $this->createCoupon($this->main_record);
        $this->createAnswer($this->main_record);
        $this->close_store('Customer');
        $this->resetInputFields();
    }

    public function linkRecords($customer) {
        // ligados
        $this->main_record->promotions()->detach($customer);
        $this->main_record->promotions()->attach($customer);
    }

    public function createCoupon($customer) {
        // ¿Por qué crear el cupón con el primer regalo?
        // El cupón lo debe elegir el "USUARIO" en el formulario
        $promotion_id = $this->promotion->gifts->first();
        if ($promotion_id) {
            $record_code = null;
            do {
                $code_random = chr(rand(ord('a'), ord('z'))) . chr(rand(ord('a'), ord('z'))) . rand(1,9999);
                $record_code = Coupon::Code($code_random);
            } while (is_null($record_code));

            $this->coupon = Coupon::create([
                'customer_id'   => $customer->id,
                'gift_id'       => $promotion_id->id,
                'code'          => $code_random,
                'expire_at'     => $this->promotion->expire_at,
            ]);
        }
    }

    public function createAnswer($customer) {
        $promotion_id = $this->promotion->gifts->first();
        foreach ($this->option_id as $value) {
            $options = Option::where('id', $value)->get();
            if ($options) {
                foreach ($options as $key => $option) {
                    if (App::isLocale('en')) {
                        $this->answer = Answer::create([
                            'customer_id'   => $customer->id,
                            'promotion_id'  => $promotion_id->id,
                            'option_id'     => $options[$key],
                            'value'         => $option->english,
                        ]);
                    } else {
                        $this->answer = Answer::create([
                            'customer_id'   => $customer->id,
                            'promotion_id'  => $promotion_id->id,
                            'option_id'     => $options[$key],
                            'value'         => $option->spanish,
                        ]);
                    }
                }
            }
        }
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}
