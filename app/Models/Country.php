<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Country extends Model
{
    use HasFactory;

    protected $fillable =  [
        'country',
        'code',
        'url',
        'isdefault',
        'include',
        'latinoamerica'
    ];

    //country_identification
    //customers
    public function customers(): HasMany
    {
        return $this->hasMany('App\Models\Customer', 'country_id', 'id');
    }


    /**+------------------------+
     * | Funciones de apoyo     |
     * +------------------------+
     */
    // ¿Puede ser borrado?
    public function can_be_delete(){
        return true;
    }


}
