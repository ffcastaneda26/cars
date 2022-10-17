<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieBreak extends Model
{
    use HasFactory;
    protected $table = 'tie_breaks';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'short_english',
        'spanish',
        'short_spanish'
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

    public function scopeName($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('short_spanish','LIKE',"%$valor%")
                  ->orwhere('short_english','LIKE',"%$valor%");
         }
    }

}
