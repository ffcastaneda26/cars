<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    public $timestamps = false;
    protected $fillable =  [
        'round_id',
        'local_team_id',
        'local_score',
        'visit_team_id',
        'visit_score',
        'date',
        'points_winner',
        'extra_points_winner'
    ];

    // protected $casts = [
    //     'Date' => 'datetime:Y-m-d'
    // ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function Round():BelongsTo
     {
        return $this->belongsTo(Round::class);
     }

     public function LocalTeam():BelongsTo
     {
        return $this->belongsTo(Team::class,'local_team_id');
     }


     public function VisitTeam():BelongsTo
     {
        return $this->belongsTo(Team::class,'visit_team_id');
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

    public function scopeActiveRound($query)
    {
        $query->filter(function($item) {
            if (Carbon::now()->between($item->from, $item->to)) {
              return $item;
            }
          });
    }

    public function scopeRound($query,$from,$to)
    {
        $query->where('from','>=',$from)
              ->where('to','<=',$to);
    }


}
