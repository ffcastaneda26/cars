<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryVehicle extends Model
{
    use HasFactory;

    protected $table = 'temporary_vehicles';
    protected $fillable = [
        'location_id',
        'vin',
        'make',
        'model',
        'model_year',
        'product_type',
        'body',
        'trim',
        'series',
        'drive',
        'engine_cylinders',
        'number_of_doors',
        'number_of_seat_rows',
        'number_of_seats',
        'steeering',
        'engine_displacement',
        'engine_power_kw',
        'engine_power_hp',
        'fuel_type_primary',
        'fuel_type_secondary',
        'engine_model',
        'transmission',
        'transmission_full',
        'number_of_gears',
        'color_exterior_id',
        'color_interior_id',
        'description',
        'price',
        'slug',
        'miles',
        'available',
        'show',
        'manufacturer',
        'vehicle_id',
    ];

    /**+-------------+
       | Relaciones |
       +------------+
    */

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }


    /**+------------+
     * | Búsquedas  |
     * +------------+
     */

    public function scopevin($query, $value)
    {
        $query->where('vin', $value);
    }

}
