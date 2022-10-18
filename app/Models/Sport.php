<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    use HasFactory;
    protected $table = 'sports';
    public $timestamps = false;
    protected $fillable =  [
        'sport_id',
        'english',
        'short_english',
        'spanish',
        'short_spanish',
        'individual',
        'logotipo'
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function tournaments(): HasMany
    {
        return $this->hasMany(Tournament::class);
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->tournaments()->count()) return false;
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeName($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%")
                  ->orwhere('short_spanish','LIKE',"%$valor%")
                  ->orwhere('short_english','LIKE',"%$valor%");
         }
    }

}
