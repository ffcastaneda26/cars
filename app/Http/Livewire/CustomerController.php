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
use Carbon\Carbon;
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
    public $dependent_options_ids=[];
    public $gift_id = null;
    public $coupon;
    public $show_coupon = false;
    public $question_error_message = null;
    public $option_record   = null;


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
        $this->reset('email', 'option_id', 'gift_id');
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

        $this->question_error_message = null;

        foreach($this->option_id as $option_id){
            if($option_id == "Select" || $option_id == "" || strlen($option_id) < 1){
                $this->question_error_message = __('Please answer all questions');
                break;
            }
        }

        $this->validate();
        // Traemos Correo
        // if($this->main_record->email) {
        //     $customer_record = Customer::where('email',$this->main_record->email)->get();
        //     if($customer_record){ // Encontró un registro con ese correo
        //         if($this->record_id ){ // Está editando
        //             if($customer_record->email != $this->main_record->email){
        //                 $this->validator->errors()->add('email', 'Email has already been taken.');
        //             }
        //         }else{
        //             $this->validator->errors()->add('email', 'Email has already been taken.');
        //         }
        //     }
        // }

        if(!$this->question_error_message){
            $this->main_record->save();                                                     // Se graba Participante
            $this->linkRecords($this->main_record);                                         // Particpante-Promoción
            $this->coupon = $this->createCoupon($this->main_record,$this->gift_id);         // Se crea el cupón
            $this->createAnswer($this->main_record,$this->promotion);                       // Grabar respuestas
            $this->close_store('Customer');                                                 // Aviso que se creó
            $this->view_coupon($this->coupon);                                              // A presentar cupón
            $this->resetInputFields();                                                      // Restablecer variables
        }

    }

    public function linkRecords($customer) {
        // ligados
        $this->main_record->promotions()->detach($customer);
        $this->main_record->promotions()->attach($customer);
    }

    public function createCoupon(Customer $customer,$gift_id) {

        $record_code = null;
        do {
            $code_random = chr(rand(ord('A'), ord('Z'))) . chr(rand(ord('A'), ord('Z'))) . str_pad(rand(1,9999),4,"0",STR_PAD_LEFT);
            $record_code = Coupon::Code($code_random);
        } while (is_null($record_code));

        if($this->promotion->expiration_type == 'days'){
            // TODO: Validar que calcule bien la fecha
            if($this->promotion->days_expire_gifts){
                $expire_coupon = new Carbon();
                $expire_coupon->addDays($this->promotion->days_expire_gifts);
            }else{
                $expire_coupon = $this->promotion->expire_at;
            }
        }else{
            if($this->promotion->expire_at_coupons){
                $expire_coupon = $this->promotion->expire_at_coupons;
            }else{
                $expire_coupon = $this->promotion->expire_at;
            }
        }

        return Coupon::create([
            'customer_id'   => $customer->id,
            'gift_id'       => $gift_id,
            'code'          => $code_random,
            'expire_at'     => $expire_coupon,
        ]);

    }

    public function createAnswer(Customer $customer,Promotion $promotion) {
        // Respuetas a preguntas diretas
        foreach($this->option_id as $answer){
            Answer::create([
                'customer_id'   => $customer->id,
                'promotion_id'  => $promotion->id,
                'option_id'     => $answer
            ]);
        }

        // Respuestas a preguntas dependientes
        foreach($this->dependent_options_ids as $answer){
            Answer::create([
                'customer_id'   => $customer->id,
                'promotion_id'  => $promotion->id,
                'option_id'     => $answer
            ]);
        }
    }

    public function view_coupon(Coupon $coupon) {
        $this->show_coupon = true;
        $this->coupon = $coupon;
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }

    /** Lee opción */
    public function read_option(){
        if(count($this->option_id )){
            foreach($this->option_id as $option_id){
                if($option_id != "Select" || $option_id != "" || strlen($option_id) ){
                    $this->option_record = Option::where('id',$option_id)->first();
                }
            }
        }
    }
}
