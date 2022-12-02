<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Location extends Model
{
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = [
        'dealer_id',
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
        'active'
    ];

    protected $casts = [

    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

    // Inventario

    public function inventories() {
		return $this->hasMany(Inventory::class);
	}

    // Inventario Temporal
    public function temporary_inventories() {
		return $this->hasMany(TemporaryInventory::class);
	}


    // Vehículos
    public function vehicles() {
		return $this->hasMany(Vehicle::class);
	}


    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->inventories()->count()){ return false;}
        if($this->temporary_inventories()->count()){ return false;}
        if($this->vehicles()->count()){ return false;}
        return true;
    }

    // Las redes sociales

    public function socials(): MorphToMany
    {
        return $this->morphToMany(SocialNetwork::class,'socialable');
    }



    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
    */

    public function scopeName($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%");
        }
    }

}
