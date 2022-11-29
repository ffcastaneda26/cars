<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'statuses';
    public $timestamps = false;
    protected $fillable =  [
        'english',
        'short_english',
        'spanish',
        'short_spanish'
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

    public function scopeEnglish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('english','LIKE',"%$valor%");
         }
    }

    public function scopeSpanish($query,$valor)
    {
        if ( trim($valor) != "") {
            $query->where('spanish','LIKE',"%$valor%");
         }
    }
}
