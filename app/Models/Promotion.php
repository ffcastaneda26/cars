<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    public $timestamps = false;
    protected $fillable =  [
        'spanish',
        'english',
        'begin_at',
        'expire_at',
        'active',
    ];

    // Setters
    public function setSpanishAttribute($value)
    {
        $this->attributes['spanish'] =  ucwords(strtolower($value));
    }

    public function setEnglishAttribute($value)
    {
        $this->attributes['english'] =  ucwords(strtolower($value));
    }


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */




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

    public function scopePromotion($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('short_spanish','LIKE',"%$valor%")
                  ->orwhere('short_english','LIKE',"%$valor%");
         }
    }

}
