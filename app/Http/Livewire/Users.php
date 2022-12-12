<?php

namespace App\Http\Livewire;

use App\Models\Role;

use App\Models\User;
use App\Models\Dealer;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Users extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use WithFileUploads;

    public $first_name, $last_name, $email, $phone, $password, $active, $password_confirmation;

    public $roles = null, $role_id = null, $role = null;
    public $dealers = null, $dealer_id = null;
    public $header;
    public $show_dealers = false;

    /* Inicio de Paginacion y listener */
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    /*+-----------------------+
      | Inicializa Componente |
      +-----------------------+
    */

    public function mount()
    {

        $this->authorize('hasaccess', 'users.index');
        $this->manage_title = __('Manage') . ' ' . __('Users');
        $this->header = __('Manage') . ' ' . __('Users');

        $this->search_label = "User Name or Email";
        $this->view_form    = 'livewire.users.form';
        $this->view_table   = 'livewire.users.table';
        $this->view_list    = 'livewire.users.list';
        $this->readRoles();
        $this->readDealers();
    }

    /**
     * Busca y regresa vista con usuarios
     */
    public function render()
    {
        $this->create_button_label =  $this->record_id ?    __('Update') . ' ' . __('User')
            : __('Create') . ' ' . __('User');
        $searchTerm = '%' . $this->search . '%';

        if (Auth::user()->IsAdmin()) {
            $this->show_dealers = $this->role_id == 2;
            return view('livewire.index', [
                'records' => User::User($this->search)->paginate($this->pagination),
            ]);
        }
        $this->show_dealers = false;

        if (Auth::user()->dealers->count()) {

            $records = Auth::user()->dealers->first()->users()->paginate($this->pagination);
        } else {
            $records = null;
        }
        return view('livewire.index', compact('records'));
    }



    // Lee los roles para SELECT en formulario

    private function readRoles()
    {
        $this->roles = Auth::user()->isAdmin() ? Role::AdminRoles()->get() : Role::ManagerRoles()->get();
    }

    // Lee los dealers
    private function readDealers()
    {
        $this->dealers = Auth::user()->isAdmin() ? Dealer::orderby('name')->get() : null;
    }


    /**
     * Inicializa variables de registro
     */

    private function resetInputFields()
    {
        $this->reset(['record_id', 'first_name', 'last_name', 'email', 'phone', 'record', 'role_id', 'password', 'password_confirmation', 'dealer_id']);
    }

    /**+------------------------------------+
     * | Valida - Crea - Actuaaliza Usuario |
     * +------------------------------------+
     */

    public function store()
    {

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
    private function validateUser()
    {

        $this->validate([
            'first_name'    => 'required|min:5|max:60',
            'last_name'     => 'required|min:5|max:60',
            'email'         => 'required|email|unique:users,email,' . $this->record_id,
            'phone'         => 'required|digits|min:10:max:10|unique:users,phone,' . $this->record_id,
            'role_id'       => 'required|exists:roles,id',
        ]);

        if (!$this->record_id) {
            $this->validate([
                'password'              => 'required',
                'password_confirmation' => 'required_with:password',
            ]);
        }


        if ($this->role_id == 2 || $this->role_id == 4) {
            $this->validate([
                'dealer_id' => 'required|exists:roles,id',
            ]);
        }
    }

    /**+----------------+
     * | Crear Usuario  |
     * +----------------+
     */

    private function createUser()
    {

        $user = User::create([
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'password'          => Hash::make($this->password),
            'email_verified_at' => now()
        ]);

        $user->roles()->sync($this->role_id);

        if (Auth::user()->isAdmin() && $this->role_id == 2 && $this->dealer_id) {
            $user->dealers()->sync($this->dealer_id);
        }

        if (Auth::user()->isManager()) {
            $user->dealers()->sync(Auth::user()->dealers->first());
        }

        $user->save();
        return $user;
    }

    /**+-------------------+
     * | Actualizar Usuario  |
     * +---------------------+
     */

    private function updateUser()
    {
        $user = User::findOrFail($this->record_id);
        $user->update([
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'active'    => $this->active ? 1 : 0,
        ]);

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if ($this->role_id) {
            $user->roles()->sync($this->role_id);
        }

        if ($this->role_id == 2 && $this->dealer_id) {
            $user->dealers()->sync($this->dealer_id);
        }

        if (Auth::user()->isAdmin() && $this->role_id == 2 && $this->dealer_id) {
            $user->dealers()->sync($this->dealer_id);
        }

        if (Auth::user()->isManager()) {
            $user->dealers()->sync(Auth::user()->dealers->first());
        }

        $user->save();
    }



    /**
     * Mueve datos del registro a las variables
     */

    public function edit(User $record)
    {
        $this->resetInputFields();

        $this->create_button_label = __('Update') . ' ' . __('User');
        $this->record       = $record;
        $this->record_id    = $record->id;
        $this->first_name   = $record->first_name;
        $this->last_name    = $record->last_name;
        $this->email        = $record->email;
        $this->phone        = $record->phone;
        $this->active       = $record->active;
        $this->role_id      = $record->roles()->first()->id;
        $this->updating_record = true;
        if (!Auth::user()->isAdmin()) {
            $this->dealer_id = Auth::user()->dealers->first()->id;
        }


        $this->openModal();
    }

    /*+--------------------+
	  | Elimina Registro   |
	  +--------------------+
    */
    public function destroy(User $record)
    {
        $this->delete_record($record, __('User') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }
}
