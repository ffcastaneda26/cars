<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionx extends Model
{
    use HasFactory;
    protected $table = 'questions';
    public $timestamps = false;
    protected $fillable =  [
        'spanish',
        'english',
        'type_question_id',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */


    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class);
    }


     public function options():HasMany
     {
        return $this->hasMany(Option::class);
     }

     public function type_question():BelongsTo
     {
        return $this->belongsTo(TypeQuestion::class);
     }




    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->options()->count()) return false;
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeQuestion($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}
