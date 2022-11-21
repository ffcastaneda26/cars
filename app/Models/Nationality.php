<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;
    protected $table = 'nationalities';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'short_english',
        'spanish',
        'short_spanish',
    ];


    protected function english(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords(strtolower($value)),
        );
    }

    protected function shortEnglish(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords(strtolower($value)),
        );
    }



    protected function spanish(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords(strtolower($value)),
        );
    }


    protected function shortSpanish(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucwords(strtolower($value)),
        );
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

    public function scopeNationality($query,$valor)
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
