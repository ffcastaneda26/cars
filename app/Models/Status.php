<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'short_english',
        'spanish',
        'short_spanish',
        'color',
        'text_color'
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

    public function scopeStatus($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('short_spanish','LIKE',"%$valor%")
                  ->orwhere('short_english','LIKE',"%$valor%");
         }
    }

    public function scopeSpanish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('short_spanish','LIKE',"%$valor%");
         }
    }
    public function scopeEnglish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('english','LIKE',"%$valor%")
                  ->orwhere('short_english','LIKE',"%$valor%");
         }
    }

    public function scopeOnlyEnglish($query,$value){
        if ( trim($value) != "") {
            $value = trim($value);
            $query->where('english',$value);
         }
    }

    public function scopeOnlySpanish($query,$value){
        if ( trim($value) != "") {
            $value = trim($value);
            $query->where('spanish',$value);
         }
    }
}
