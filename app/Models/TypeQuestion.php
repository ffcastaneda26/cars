<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeQuestion extends Model
{
    use HasFactory;
    protected $table = 'type_questions';
    public $timestamps = false;
    protected $fillable =  [
        'spanish',
        'english',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function questions():HasMany
    {
       return $this->hasMany(Questionx::class);
    }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->questions()->count()) return false;
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeTypeQuestion($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}

