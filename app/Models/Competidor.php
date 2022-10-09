<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

     public function Picks():HasMany
     {
        return $this->hasMany(Pick::class);
     }


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