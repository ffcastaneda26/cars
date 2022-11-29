<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    protected $table = 'makes';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'image_path'
    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

    // Modelos
    public function models() {
		return $this->hasMany(Modell::class, 'make_id', 'id');
	}

    // Vehículos
    public function vehicles() {
		return $this->hasMany(Vehicle::class);
	}

    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->models()->count()){ return false;}
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
