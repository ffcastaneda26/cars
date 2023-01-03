<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'spanish',

    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function vehicles_exterior(): HasMany
    {
        return $this->hasMany(Vehicle::class,'exterior_color_id');
    }

    public function vehicles_interior(): HasMany
    {
        return $this->hasMany(Vehicle::class,'interior_color_id');
    }

    public function total_vehicles_exterior(){
        return $this->vehicles_exterior->count();
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->vehicles_exterior()->count()){ return false;}
        if($this->vehicles_interior()->count()){ return false;}
        return true;
    }



    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeComplete($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
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
