<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    public $timestamps = false;


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function dealers():BelongsToMany
    {
        return $this->belongsToMany(Dealer::class);
    }


	public function hasDealer($dealer_id){
        foreach($this->dealers as $dealer){
            if($dealer->id == $dealer_id){
                return true;
            }
        }
        return false;
	}

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->dealers()->count()){ return false;}
        return true;
    }



    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeComplete($query,$valor)
    {

        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%")
                  ->orwhere('english','LIKE',"%$valor%");
         }
    }


}
