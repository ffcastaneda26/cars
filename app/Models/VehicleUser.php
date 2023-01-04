<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class VehicleUser extends Pivot
{
    use HasFactory;
    protected $table = 'vehicle_user';
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
