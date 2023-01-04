<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserVehicle extends Model
{
    use HasFactory;
    protected $table = 'user_vehicle';
    protected $fillable =[
        'user_id',
        'vehicle_id',
        'status_id',
        'user_updated_id',
     ];

    /*+------------+
      | Relaciones |
      +------------+
     */
    public function user_updated(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_updated_id');
    }
    
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class,'user_updated_id');
    }



}
