<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;

    protected $table = 'social_networks';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image_path',
        'active'
    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

     // Redes Sociales
     public function dealers()
     {
        return $this->morphedByMany(Dealer::class,'socialable');
     }



    /** Funciones de Apoyo */

    public function can_be_delete(){
        return true;
    }

    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
    */

    public function scopeName($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%");
        }
    }

}
