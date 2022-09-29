<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;
    protected $table = 'options';
    public $timestamps = false;
    protected $fillable =  [
        'question_id',
        'spanish',
        'english'
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function question():BelongsTo
     {
        return $this->belongsTo(Questionx::class);
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

    public function scopeOption($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}

