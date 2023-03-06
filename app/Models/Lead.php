<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'name',
        'phone',
        'email'
    ];


    // Setters
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] =  strtolower($value);
    }


    /** Funciones de Apoyo */

    public function can_be_delete(){
        return true;
    }

    /**+------------+
     * | Búsquedas  |
     * +------------+
    */

    public function scopeComplete($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%")
                  ->orwhere('phone', 'LIKE', "%$valor%")
                  ->orwhere('email', 'LIKE', "%$valor%");
        }
    }
}
