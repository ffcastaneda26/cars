<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    public $timestamps = false;
    protected $fillable =  [
        'customer_id',
        'gift_id',
        'code',
        'expire_at',
        'user_id',
        'used_at',
        'used',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function customer(): BelongsTo
     {
        return $this->belongsTo(Customer::class);
     }

     public function gift(): BelongsTo
     {
        return $this->belongsTo(Gift::class);
     }

     public function user(): BelongsTo
     {
        return $this->belongsTo(User::class);
     }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        return true;
    }

    public function isUsed(){
        return $this->used;
    }

    public function mark_as_used(){
        $this->user_id    = Auth::user()->id;
        $this->used_at    = now();
        $this->used       = true;
        $this->save();
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */


    public function scopeCustomerId($query,$valor)
    {
        if($valor){
            $query->where('customer_id',$valor);
        }
    }

    public function scopeCode($query,$valor){
        if($valor) $valor=trim($valor);
        $query->where('code',$valor);
    }



}
