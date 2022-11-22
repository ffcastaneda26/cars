<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';
    public $timestamps = false;

    protected $fillable =  [
        'spanish',
        'english',
        'code',
    ];


    /*+-------------+
      | Relaciones  |
      +-------------+
    */



    /*+-------------+
      | Apoyo       |
      +-------------+
    */

    public function can_be_delete(){

        return true;
    }

    /*+-------------+
      | Búsquedas   |
      +-------------+
    */

    public function scopeComplete($query,$value)
    {
        if ( trim($value) != "") {
            $query->where('spanish','LIKE',"%$value%")
                ->orwhere('english','LIKE',"%$value%");
         }
    }

}

