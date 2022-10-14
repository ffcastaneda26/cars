<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pick extends Model
{
    use HasFactory;
    protected $table = 'picks';
    protected $fillable =  [
        'competidor_id',
        'game_id',
        'winner',
        'local_score',
        'visit_score',
        'guess_game',
        'guess_local_score',
        'guess_visit_score',
        'dif_winner_score',
        'dif_total_score',
        'dif_local_score',
        'dif_visit_score',

    ];

    protected $casts = [
        'Date' => 'datetime:Y-m-d'
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function Competidor():BelongsTo
    {
        return $this->belongsTo(Competidor::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
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
}
