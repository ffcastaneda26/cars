<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ethnicity extends Model
{
    use HasFactory;
    protected $table = 'ethnicities';
    public $timestamps = false;
    protected $fillable =  [
        'spanish',
        'english',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function customers():HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->customers()->count()) return false;
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeEthnicity($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}

