<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Round extends Model
{
    use HasFactory;
    protected $table = 'rounds';
    public $timestamps = false;
    protected $fillable =  [
        'date_from',
        'date_to',
        'active',
    ];

    protected $casts = [
        'date_from' => 'datetime:Y-m-d',
        'date_to' => 'datetime:Y-m-d',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->games()->count()) return false;
        return true;
    }

    public function isActive(){
        return $this->active;
    }


    public function readActiveRoundx(){

        // $this->now()->diffInSeconds($this->date_from) < 1);



        // SELECT * FROM rounds WHERE date(now()) between date_from AND date_to OR date(now()) <= date_to ORDER BY date_from LIMIT 1
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */



    public function scopeActiveRound($query )
    {

        $query->whereBetween('date_from',[now()->startOfDay(),now()->endOfDay()]);

    }

    public function scopeRound($query,$from,$to)
    {
        $query->where('from','>=',$from)
              ->where('to','<=',$to);
    }


}
