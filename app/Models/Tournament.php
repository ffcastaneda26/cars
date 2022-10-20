<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tournament extends Model
{
    use HasFactory;
    protected $table = 'tournaments';
    public $timestamps = false;
    protected $fillable =  [
        'sport_id',
        'name',
        'allow_ties',
        'require_all_picks',
        'minutes_before_to_edit',
        'available_user_at_register',
        'create_picks_at_available',
        'logotipo',
        'active'
    ];



    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function Sport():BelongsTo
    {
       return $this->belongsTo(Sport::class);
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

    public function scopeName($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%");
         }
    }

    // Solo activos
    public function scopeActive($query,$active=true)
    {
        $query->where('active',$active);
    }

}

