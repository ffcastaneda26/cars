<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable =  [
        'name',
        'email',
        'phone',
        'address',
        'zipcode',
        'latitude',
        'longitude',
        'logotipo',
        'active',
    ];


    /*  +-----------------+
        | Relaciones      |
        +-----------------+
    */

	public function users(): BelongsToMany
    {
		return $this->belongsToMany(User::class)->withTimesTamps();
	}


    /*+-----------------+
    | Funciones Apoyo |
    +-----------------+
    */

    public function can_be_delete(){
        if($this->users()->count()) return false;
        return true;
    }

    public function isActive(){
        return $this->active;
    }


    /*+-------------------+
        | Búsquedas         |
        +-------------------+
    */

    public function scopeCompany($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%")
                ->orwhere('phone','LIKE',"%$valor%")
                ->orwhere('email','LIKE',"%$valor%");
        }
    }

}
