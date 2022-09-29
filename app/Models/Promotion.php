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
        'active',
    ];

    // Setters
    // public function setSpanishAttribute($value)
    // {
    //     $this->attributes['spanish'] =  ucwords(strtolower($value));
    // }

    // public function setEnglishAttribute($value)
    // {
    //     $this->attributes['english'] =  ucwords(strtolower($value));
    // }


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
        return $this->belongsToMany(Questionx::class,'promotion_question');
    }



    // ¿Promoción ligada a la pregunta?
    public function islinkedQuestion($question_id)
    {
        return $this->belongsToMany(Questionx::class,'promotion_question')
                    ->where('question_id', $question_id);

    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->gifts()->count()) return false;
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
