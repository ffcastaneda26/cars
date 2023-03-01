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
    public function vehicles(): HasMany
    {
		return $this->hasMany(Vehicle::class);
	}


    /** Funciones de Apoyo */

    public function can_be_delete(){
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
