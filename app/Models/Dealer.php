<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Dealer extends Model
{
    use HasFactory;
    protected $table = 'dealers';
    protected $fillable = [
        'name',
        'email',
        'website',
        'zipcode',
        'address',
        'phone',
        'logotipo',
        'latitude',
        'longitude',
        'position',
        'complete_address',
        'expire_at',
        'max_locations',
        'active'
    ];

    protected $casts = [
        'expire_at' => 'datetime:Y-m-d',
    ];

    /*+-------------+
      | Relaciones  |
      +-------------+
    */

     // Usuarios
    public function users() {
		return $this->belongsToMany(Dealer::class);
	}

    // Sucursales (Localidades)
    public function locations() {
		return $this->hasMany(Location::class);
	}

    // Redes Sociales

    public function socials(): MorphToMany
    {
        return $this->morphToMany(SocialNetwork::class,'socialable');
    }


    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->locations()->count()){ return false;}
        return true;
    }



    /**+------------+
       | Búsquedas  |
       +------------+
    */

    public function scopeName($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%");
        }
    }


}
