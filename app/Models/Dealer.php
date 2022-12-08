<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Dealer extends Model
{
    use HasFactory;
    protected $table = 'dealers';


    protected $casts = [
        'expire_at' => 'datetime:Y-m-d',
    ];

    /*+-------------+
      | Relaciones  |
      +-------------+
    */

    // Paquete que tiene contratado
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    // Usuarios
    public function users(): BelongsToMany {
		return $this->belongsToMany(User::class);
	}

    // Sucursales (Localidades)
    public function locations(): HasMany
    {
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
