<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EdgeRange extends Model
{
    use HasFactory;
    protected $table = 'edge_ranges';
    public $timestamps = false;
    protected $fillable =  [
        'edge_from',
        'edge_to',
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

    public function customers():HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->customers()->count()) return false;
        return true;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */



}

