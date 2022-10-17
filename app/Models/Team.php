<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    public $timestamps = false;
    protected $fillable =  [
        'sport_id',
        'name',
        'alias',
        'short',
        'logotipo',
        'request_score',
        'active',
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function Sport(): BelongsTo
    {
        $this->belongsTo(Sport::class);
    }

    public function LocalGames(): HasMany
    {
        return $this->hasMany(Game::class,'local_team_id');
    }

    public function VisitGames(): HasMany
    {
        return $this->hasMany(Game::class,'visit_team_id');
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->LocalGames()->count()) return false;
        if($this->VisitGames()->count()) return false;
        return true;
    }

    public function isActive(){
        return $this->active;
    }


    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeTeam($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('name','LIKE',"%$valor%")
                  ->orwhere('alias','LIKE',"%$valor%")
                  ->orwhere('short','LIKE',"%$valor%");
         }
    }


}
