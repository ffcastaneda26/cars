<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'expiration_type',
        'days_expire_gifts',
        'expire_at_coupons',
        'active',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */


    public function gifts(): HasMany
    {
        return $this->hasMany(Gift::class);
    }

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class,'promotion_question');
    }



    // ¿Promoción ligada a la pregunta?
    public function islinkedQuestion($question_id)
    {
        return $this->belongsToMany(Question::class,'promotion_question')->where('question_id', $question_id);

    }

    // Clientes
    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class);
    }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->gifts()->count()) return false;
        if($this->questions()->count()) return false;
        if($this->customers()->count()) return false;


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
