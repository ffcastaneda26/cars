<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    use UserTrait;

    protected $table = 'permissions';
    public $timestamps = false;

    protected $fillable = [
        'name','slug','english', 'spanish'
	];

	public function roles() {
		return $this->belongsToMany(Role::class);
	}

	public function users() {
		return $this->belongsToMany(User::class);
	}

	public function hasRole($role_id){
        foreach($this->roles as $role){
            if($role->id == $role_id){
                return true;
            }
        }
        return false;
	}

	// ¿Puede ser borrado?
	public function can_be_delete(){
		if($this->roles()->count()){ return false;}
		if($this->users()->count()){ return false;}
		return true;
	}

    /*+-------------+
      | Busquedas   |
      +-------------+
    */


    public function scopePermission($query,$valor){
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('name','LIKE',"%$valor%");
         }
    }

    public function scopeName($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%");
         }
    }
    public function scopeSpanish($query,$valor)
    {

        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('slug','LIKE',"%$valor%");
         }
    }
    public function scopeEnglish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('english','LIKE',"%$valor%")
                  ->orwhere('slug','LIKE',"%$valor%");
         }
    }
}
