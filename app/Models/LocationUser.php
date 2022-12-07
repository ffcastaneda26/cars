<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LocationUser extends Model
{
    use HasFactory;
    protected $table = 'location_user';

    protected $fillable =[
        'location_id',
        'user_id'
    ];
    /**+-------------+
     * | Relaciones |
     * +------------+
     */

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
