<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Ethnicity;

use App\Traits\ZipCodeTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Customers extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    protected $listeners = ['destroy'];

    public $ethnicities=null;
    public $city_town = null;
    public $email;

    protected $rules = [
        'main_record.first_name'        => 'required|min:3|max:40',
        'main_record.last_name'         => 'required|min:3|max:40',
        'main_record.email'             => 'nullable|email|max:100',
        'main_record.phone'             => 'required|digits:10',
        'main_record.address'           => 'required',
        'main_record.zipcode'           => 'required|digits:5|exists:zipcodes,zipcode',
        'main_record.gender'            => 'required|in:Female,Male,Other',
        'main_record.ethnicity_id'      => 'required|exists:ethnicities,id',
        'main_record.birthday'          => 'nullable',
        'main_record.agree_be_legal_age'=> 'required'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'customers.index');
        $this->manage_title = __('Manage') . ' ' . __('Customer');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.customers.form';
        $this->view_table = 'livewire.customers.table';
        $this->view_list = 'livewire.customers.list';
        $this->main_record = new Customer();
        $this->ethnicities = Ethnicity::all();

    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Customer');

        return view('livewire.index', [
            'records' => Customer::Customer($this->search)->paginate($this->pagination),
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
                                                                   : 'nullable|emailunique:customers,email';

        $this->validate();


        // Traemos Correo
        if($this->email){
            $customer_record = Customer::where('email',$this->email)->first();
            if($customer_record){ // Encontró un registro con ese correo
                dd($customer_record->email);
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

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Customer $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->email        = $record->email;
        $this->create_button_label = __('Update') . ' ' . __('Customer');
        $this->read_town_state($this->main_record->zipcode);
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Customer $record)
    {
        $this->delete_record($record, __('Customer') . ' ' . __('Deleted Successfully!!'));
    }

    /** Lee Zipcode */
    public function read_zipcode(){
        $this->read_town_state($this->main_record->zipcode);
    }
}

