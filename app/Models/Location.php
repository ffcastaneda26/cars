<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    // Distribuidor
    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }


    // Vehículos
    public function vehicles(): HasMany
    {
		return $this->hasMany(Vehicle::class);
	}


     // Usuarios
     public function users(): BelongsToMany
     {
		return $this->belongsToMany(User::class);
	}

    /** Fotos a través de vehículos */
    public function photos()
    {
        return $this->hasManyThrough(Photo::class, Vehicle::class);
    }



    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->vehicles()->count()){ return false;}
        return true;
    }


    public function total_photos()
    {
        return $this->photos()->count();
    }

    /** ¿Puede seguir agregando fotos */

    public function can_add_photos(){
        return $this->dealer->package->max_vehicles_by_dealer  > $this->total_photos;
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
