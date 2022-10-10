<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    public $timestamps = false;
    protected $fillable =  [
        'name',
        'address',
        'email',
        'phone',
        'zipcode',
        'logotipo',
        'code',
        'active',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */



    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        return true;
    }

    public function isActive(){
        return $this->active;
    }


    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeCompany($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%")
                  ->orwhere('phone','LIKE',"%$valor%")
                  ->orwhere('email','LIKE',"%$valor%");
         }
    }

    public function scopeCode($query,$valor)
    {
        $valor = trim($valor);
        $query->where('code',$valor);
    }

}
