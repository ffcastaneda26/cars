<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zipcode extends Model
{
    public $timestamps = false;
	protected $table = 'zipcodes';
	protected $fillable =  [
        'zipcode',
        'town',
        'type',
        'state',
        'county',
        'timezone',
        'areacode',
        'latitude',
        'longitude',
        'region',
        'country'
    ];

	   /*+-----------------------------+
      | Relaciones entre tablas     |
      +-----------------------------+
    */


    public function dealers(): HasMany
    {
        return $this->hasMany(Dealer::class,'zipcode','zipcode');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class,'zipcode','zipcode');
    }




    /*+---------------------------------+
      | Búsquedas x diferentes Criterios |
      +----------------------------------+
    */
    // Town
    public function scopeZipcode($query,$valor)
    {
        if ( trim($valor) != "") {
           $query->where('zipcode','LIKE',"%$valor%");
        }
    }
    // Town
    public function scopeTown($query,$valor)
    {
        if ( trim($valor) != "") {
           $query->where('town','LIKE',"%$valor%");
        }
    }

    public function scopeState($query,$valor)
    {
        if ( trim($valor) != "") {
           $query->where('state','LIKE',"%$valor%");
        }
    }
  /*+---------+
    | Listas  |
    +---------+
  */
    // Lista de zonas postales por pueblo o ciudad
    public function  zipcodes_list(){
        return $this->orderBy('town')->pluck('town', 'zipcode');
    }

    public function can_be_delete(){
        if($this->companies()->count()){ return false;}
        if($this->subsidiaries()->count()){ return false;}
        if($this->customers()->count()){ return false;}
        return true;
    }
}
