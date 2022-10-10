<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function ProcessesCode():HasMany
    {
        return $this->hasMany(ProcessCodeCompany::class);
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->ProcessesCode()->count()) return false;
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
