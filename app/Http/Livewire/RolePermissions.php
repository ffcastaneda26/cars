<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Permission;
use Livewire\WithPagination;

use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RolePermissions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    public $roles, $role, $role_id;

    public function mount()
    {
        $this->authorize('hasaccess', 'role-permissions.index');
        $this->manage_title = "Assign Permissions To Role";
        $this->search_label = "Search Permission";
        $this->read_roles();
    }

    public function render()
    {
        if ($this->only_linked) {
            $records = $this->role->permissions()->Permission($this->search)->orderby('name')->paginate($this->pagination);
        } else {
            $records =  Permission::Permission($this->search)->orderby('name')->paginate($this->pagination);
        }

        return view('livewire.roles.permissions', compact('records'));

    }

    // Lee Roles
    private function read_roles()
    {
        $this->roles = Role::all();
    }

    /*+-------------------------+
      | Lee el Rol según el Id  |
      +-------------------------+
    */

    public function read_role()
    {
        $this->role = null;
        if ($this->role_id) {
            $this->role = Role::findOrFail($this->role_id);
        }
    }


    public function linkRecord($id)
    {
        $this->role->permissions()->detach($id);
        $this->role->permissions()->attach($id);
    }

    public function unlinkRecord($id)
    {
        $this->role->permissions()->detach($id);
    }
}
