<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable =  [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'zipcode',
        'gender_id',
        'ethnicity_id',
        'age',
        'birthday',
        'agree_be_legal_age',
        'agree_be_rules'
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

    // Promociones
    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class);
    }

     public function Ethnicity():BelongsTo
     {
        return $this->belongsTo(Ethnicity::class);
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
        if($this->promotions()->count()) return false;
       return true;
   }

   /*+-------------------+
     | Búsquedas         |
     +-------------------+
   */

   public function scopeCustomer($query,$valor)
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
