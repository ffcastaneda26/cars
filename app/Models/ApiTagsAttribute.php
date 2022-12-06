<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTagsAttribute extends Model
{
    use HasFactory;

    protected $table = 'api_tags_attributes';
    protected $fillable =[
        'api_tag',
        'table_attribute',
        'is_array',
        'truncate',
        'length_truncate'
    ];


    /**+------------+
       | Búsquedas  |
       +------------+
     */


    public function scopeTag($query, $value)
    {
        $query->where('api_tag', $value);
    }

}
