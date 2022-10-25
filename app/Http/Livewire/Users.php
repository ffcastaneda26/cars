<?php

namespace App\Http\Livewire;



use App\Models\Role;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Users extends Component {
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use WithFileUploads;

    public $name, $email, $nickname, $password, $active,$password_confirmation;

    public $roles=null,$role_id=null,$role=null;
    public $header;

    /* Inicio de Paginacion y listener */
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

        /*+-----------------------+
        | Inicializa Componante   |
        +-------------------------+*/


	public function mount() {
        //$this->authorize('hasaccess', 'users.index');
        $this->manage_title = __('Manage') . ' ' . __('Users');
        $this->header = __('Manage') . ' ' . __('Users');

        $this->search_label = "User Name or Email";
        $this->view_form    = 'livewire.users.form';
        $this->view_table   = 'livewire.users.table';
        $this->view_list    = 'livewire.users.list';
        $this->readRoles();

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
                'records' => User::User($this->search)->paginate($this->pagination),
            ]);
        }

        return view('livewire.index', [
            'records' => User::whereHas('roles', function (Builder $query)  {
                $query->whereIn('role_id', [2,4]);
            })->User($searchTerm)
                ->orderBy('name')
                ->paginate($this->pagination),
        ]);
	}

    // Lee los roles para SELECT en formulario
    private function readRoles(){
        if(Auth::user()->isAdmin()){
            $this->roles = Role::where('name','!=','agent')->get();
        }else{
            $this->roles = Role::whereIn('id', [2,4])->get();
        }
    }

	/**
	 * Inicializa variables de registro
	 */

	private function resetInputFields() {
        $this->reset(['record_id','name','nickname','email','record','role_id','password','password_confirmation']);
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
            'nickname'              => 'nullable',
            'email'                 => 'required|email|unique:users,email,' . $this->record_id,
            'role_id'               => 'required|exists:roles,id',
        ]);

        if(!$this->record_id){
            $this->validate([
                'password'              => 'required',
                'password_confirmation' =>'required_with:password',
            ]);
        }
    }

    /**+----------------+
     * | Crear Usuario  |
     * +----------------+
     */

    private function createUser(){
        $user = User::create([
			'name'              => $this->name,
			'nickname'          => $this->nickname,
			'email'             => $this->email,
            'password'          => Hash::make($this->password),
        ]);

        $user->roles()->sync($this->role_id);
        $user->save();
        return $user;
    }

    /**+-------------------+
     * | Actualizar Usuario  |
     * +---------------------+
     */

    private function updateUser(){
        $user = User::findOrFail($this->record_id);
        $user->update([
            'name'      => $this->name,
            'nickname'  => $this->nickname,
            'active'    => $this->active ? 1 : 0,
        ]);

        if($this->password){
            $user->password = Hash::make($this->password);
        }

        if ($this->role_id) {
            $user->roles()->sync($this->role_id);
        }
        $user->save();
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
		$this->nickname = $record->nickname;
		$this->email    = $record->email;
		$this->active   = $record->active;
        $this->role_id  = $record->roles()->first()->id;
        $this->updating_record = true;
        $this->openModal();
	}

    /*+--------------------+
	  | Elimina Registro   |
	  +--------------------+
    */
	public function destroy(User $record) {
        $this->delete_record($record, __('User') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }
}
