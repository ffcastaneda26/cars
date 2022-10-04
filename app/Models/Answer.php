<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    public $timestamps = false;
    protected $fillable =  [
        'customer_id',
        'promotion_id',
        'option_id',
        'value',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function customer(): BelongsTo
     {
        return $this->belongsTo(Customer::class);
     }

     public function promotion(): BelongsTo
     {
        return $this->belongsTo(Promotion::class);
     }

     public function option(): BelongsTo
     {
        return $this->belongsTo(Option::class);
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

    public function scopePromotionId($query,$valor)
    {
        if($valor){
            $query->where('promotion_id',$valor);
        }
    }

    public function scopeCustomerId($query,$valor)
    {
        if($valor){
            $query->where('customer_id',$valor);
        }
    }

    public function scopeOptionId($query,$valor)
    {
        if($valor){
            $query->where('option_id',$valor);
        }
    }

}
