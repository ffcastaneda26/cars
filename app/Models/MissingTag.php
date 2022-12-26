<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingTag extends Model
{
    use HasFactory;
    protected $table = 'missing_tags';

    public $timestamps = false;

    protected $fillable =[
        'api_tag',
        'value_tag'
    ];

      /*+------------+
       | Búsquedas  |
       +------------+
     */


     public function scopeTag($query, $value)
     {
         $query->where('api_tag', $value);
     }

}
