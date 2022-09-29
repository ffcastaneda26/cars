<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'genders';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'spanish',
    ];



    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        return true;
    }



    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeGender($query,$valor)
    {

        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }


}
