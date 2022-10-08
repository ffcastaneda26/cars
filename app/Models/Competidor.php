<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competidor extends Model
{
    use HasFactory;
    protected $table = 'competidors';

    protected $fillable =  [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'zipcode',
        'age',
        'birthday',
        'agree_be_rules',
        'agree_be_legal_age',
    ];

    protected $casts = [
        'birthday' => 'datetime:Y-m-d',

    ];

    // Setters


    // Getters
    public function getFullNameAttribute()
    {
        return ucwords($this->first_name) . ' ' .  ucwords($this->last_name);
    }

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */



    public function zipcodex():BelongsTo
    {
        return $this->belongsTo(Zipcode::class,'zipcode','zipcode');
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

   public function scopeCompetidor($query,$valor)
   {
       if ( trim($valor) != "") {
           $query->where('first_name','LIKE',"%$valor%")
                 ->orwhere('last_name','LIKE',"%$valor%")
                 ->orwhere('email','LIKE',"%$valor%")
                 ->orwhere('phone','LIKE',"%$valor%");
        }
   }

    Public function scopeEmail($query,$valor){
        $valor = trim($valor);
        $query->where('email',$valor);
    }


}