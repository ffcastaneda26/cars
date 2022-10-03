<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gift extends Model
{
    use HasFactory;
    protected $table = 'gifts';
    public $timestamps = false;
    protected $fillable =  [
        'promotion_id',
        'spanish',
        'english',
        'legal_legend',
        'active',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function promotion():BelongsTo
     {
        return $this->belongsTo(Promotion::class);
     }

       // Archivos
    public function files(){
        return $this->morphMany(File::class, 'fileable');
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

    public function scopeGift($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }

}
