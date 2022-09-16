<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
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

     public function type_question():BelongsTo
     {
        return $this->belongsTo(TypeQuestion::class);
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

    public function scopeQuestion($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}
