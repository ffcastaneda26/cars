<?php

namespace App\Http\Livewire;


use Carbon\Carbon;
use App\Models\Role;

use App\Models\User;
use App\Models\Account;
use Livewire\Component;
use App\Models\Membership;
use App\Models\Suscription;
use Livewire\WithPagination;
use App\Models\PaymentMethod;
use Livewire\WithFileUploads;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\Traits\CrudTrait;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class Users extends Component {
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use WithFileUploads;

    public $name, $email, $password, $active,$password_confirmation;

    public $roles=null,$role_id=null,$role=null;
    public $header;
    public $selUser;
    public $membership_id=null,$memberships=null,$expire_at, $expire_at_record;
    public $is_client = false;
    public $show_roles = true;

    /* Inicio de Paginacion y listener */
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

        /*+-----------------------+
        | Inicializa Componante   |
        +-------------------------+*/


	public function mount() {
        $this->authorize('hasaccess', 'users.index');
        $this->manage_title = __('Manage') . ' ' . __('Users');
        $this->header = __('Manage') . ' ' . __('Users');

        $this->search_label = "User Name or Email";
        $this->view_form    = 'livewire.users.form';
        $this->view_table   = 'livewire.users.table';
        $this->view_list    = 'livewire.users.list';

        $this->readRoles();
        $this->readMemberships();
        $this->selUser = null;
    }

	/**
	 * Busca y regresa vista con usuarios
	 */
	public function render() {
        $this->create_button_label =  $this->record_id ?    __('Update') . ' ' . __('User')
                                                        : __('Create') . ' ' . __('User');
        $searchTerm = '%' . $this->search . '%';

        if(Auth::user()->IsAdmin()){

            return view('livewire.index', [
                'records' => User::whereHas('roles', function (Builder $query) {
                    $query->where('role_id', '>', 0);
                })->User($searchTerm)
                ->orderBy('id')
                ->paginate($this->pagination),
            ]);
        }

        if(Auth::user()->isDirector()){
            return view('livewire.index', [
                'records' => User::whereHas('roles', function (Builder $query)  {
                    $query->whereIn('role_id', [2]);
                })->where('name', 'like', $searchTerm)
                    ->orderBy('id')
                    ->paginate($this->pagination),
            ]);
        }
        return view('livewire.index', [
            'records' => User::whereHas('roles', function (Builder $query)  {
                $query->whereIn('role_id', [1,2,3,4,5,6,7,8,9]);
            })->User($searchTerm)
                ->orderBy('id')
                ->paginate($this->pagination),
        ]);
	}

    // Lee los roles para SELECT en formulario
    private function readRoles(){
        $this->roles = Role::all();
    }

    // Lee las membresías activas
    private function readMemberships()
    {
        $this->memberships = Membership::select('id','english','spanish')->where('active','1')->get();
    }

    // Lee el rol que nos están pasando para saber si es cliente o no
    public function read_role(){
        $this->is_client = false;
        $this->role = null;
        if($this->role_id){
            $this->role = Role::findOrFail($this->role_id);
            $this->is_client = $this->role->name == 'client';
        }
        if($this->record && $this->is_client){
            $this->show_roles = false;
            $account= $this->record->account;

            foreach($account->suscriptions as $suscription){
                $this->membership_id = $suscription->membership_id;
                $this->expire_at_record     = $suscription->expire_at;

                break;
            }
        }
    }

	/**
	 * Inicializa variables de registro
	 */

	private function resetInputFields() {
        $this->reset(['record_id','name','email','record','is_client','membership_id','role_id','password','password_confirmation']);
	}

	/**+------------------------------------+
	 * | Valida - Crea - Actuzliza Usuario  |
	 * +------------------------------------+
	 */

	public function store() {

        $this->validateUser();

        if ($this->record_id) {
            $user = $this->updateUser();
        } else {
            $user = $this->createUser();

        }

        $this->create_button_label = __('Create') . ' ' . __('User');
        $this->store_message(__('User'));
		$this->closeModal();
		$this->resetInputFields();
	}

    /**+----------------+
     * | Validación     |
     * +----------------+
     */
    private function validateUser(){

        $this->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email,' . $this->record_id,
            'role_id'               => 'required|exists:roles,id',
        ]);

        if($this->is_client){
            $this->validate([
                'membership_id' => 'required|exists:memberships,id',
                'expire_at'     => 'required',
            ]);
        }else{
            $this->validate([
                'password_confirmation' =>'required_with:password',
                'password_confirmation' =>'required_with:password',
            ]);
        }

    }

    /**+----------------+
     * | Crear Usuario  |
     * +----------------+
     */

    private function createUser(){

        // TODO: Poner en una transacción y un try.. catch porque se actualiza mas de una tabla
        $password = $this->determinate_password();  // Determina que password usar

        $user = User::create([
			'name'              => $this->name,
			'email'             => $this->email,
            'password'          => Hash::make($password),
            'change_password'   => 1
        ]);

        $user->roles()->sync($this->role_id);

        $role = Role::findOrFail($this->role_id);

        if($user && $role->name == 'client' && !$this->updating_record){
            $user->update_account = 1;
            $user->save();
            $account = $this->create_account_user($user);
            if($account){
                $this->assign_account_manager($account);
                $payment_method =$this->create_account_payment_method($account);
            }

            if($payment_method){
                $suscription = $this->create_account_suscription($payment_method);
            }

            if($suscription){
                $this->send_mail_registration_notification($user,$password);
            }


        }

        $user->save();
        return $user;
    }

    /** Crea Cuenta */
    private function create_account_user(User $user){
        return Account::create([
            'user_id' => $user->id
        ]);
    }

    /** Crea Método de Pago */
    private function create_account_payment_method(Account $account){
        return PaymentMethod::create([
            'account_id' => $account->id
        ]);
    }

    /** Crea Suscripción */

    private function create_account_suscription(PaymentMethod $payment_method)
    {
        $date_expire  = New Carbon($this->expire_at);
        return Suscription::create([
            'account_id'        => $payment_method->account_id,
            'payment_method_id' => $payment_method->id,
            'membership_id'     => $this->membership_id,
            'expire_at'         => $date_expire,
            'next_payment_date' => $date_expire->addDay()
        ]);
    }

    /** Asigna el primer account manager que encuentre */
    private function assign_account_manager(Account $account){
        $role = Role::Name('accountmanager')->first();
        if($role){
            foreach ($role->users as $user_account_manager) {
                $account->account_manager_id = $user_account_manager->id;
                $account->save();
                break;
            }
         }
    }

    /** Envía correo electrónico  */
    private function send_mail_registration_notification(User $user,$password){
        Mail::to($user->email)->send(new RegistrationMail($user,$password));
    }

    /**+-------------------+
     * | Actualizar Usuario  |
     * +---------------------+
     */

    private function updateUser(){
        $password = $this->determinate_password();  // Determina que password usar

        $user = User::findOrFail($this->record_id);
        $user->update([
            'name'  => $this->name,
            'active'=> $this->active ? 1 : 0,
        ]);


        if(!$this->is_client && $this->password  ){
            $user->password = Hash::make($password);
        }

        if ($this->role_id) {
            $user->roles()->sync($this->role_id);
        }

        $user->save();
    }

    /** Determina el password */
    private function determinate_password(){
        if($this->is_client && !$this->updating_record){ // Cliente utiliza el genérico
            return env('APP_DEFAULT_PASSWORD','password');
        }else{
            if($this->password){
                return  $this->password;
            }
        }

    }

	/**
	 * Mueve datos del registro a las variables
	 */

	public function edit(User $record) {
        $this->resetInputFields();

        $this->create_button_label = __('Update') . ' ' . __('User');
        $this->record   = $record;
		$this->record_id= $record->id;
		$this->name     = $record->name;
		$this->email    = $record->email;
		$this->active   = $record->active;
        $this->role_id  = $record->roles()->first()->id;
        $this->read_role();
        $this->expire_at = $this->expire_at_record;
        $this->updating_record = true;
        $this->openModal();
	}

        /*+--------------------+
	  | Elimina Registro   |
	  +--------------------+
    */
	public function destroy(User $record) {
        $record->account->delete();
        $this->delete_record($record,__('User') . ' ' . __('Deleted Successfully!!'));
    }
}
