<?php

namespace App\Models;

use App\Models\User;
use App\Traits\UserTrait;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    use UserTrait;

    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = [
        'name','english', 'spanish','full_access',
	];

    // Setters
    public function setNameAttribute($value)
    {
        $this->attributes['name'] =  strtolower($value);
    }

	public function users():BelongsToMany
    {
		return $this->belongsToMany(User::class);
	}

	public function permissions() {
		return $this->belongsToMany(Permission::class);
	}

	public function permissions_by_name() {
		return $this->belongsToMany(Permission::class)->orderby('name');
	}

	public function hasPermissions() {
		return $this->permissions->count();
	}

    // Roles padre:
    public function roles(){
        return $this->hasMany(AllowRoles::class);
    }

	// ¿Puede ser borrado?
	public function can_be_delete(){
		if($this->permissions()->count()){ return false;}
		if($this->users()->count()){ return false;}
		return true;
	}

     /*+------------+
      | Busquedas   |
      +-------------+
    */

    public function scopeName($query,$valor)
    {
        $valor = strtolower(trim($valor));
        if( $valor != "") {
            $query->where('name',$valor);
         }
    }

    public function scopeRole($query,$valor){
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('name','LIKE',"%$valor%");
         }
    }

    public function scopeSpanish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%");
         }
    }


    public function scopeEnglish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('english','LIKE',"%$valor%");
         }
    }

}
