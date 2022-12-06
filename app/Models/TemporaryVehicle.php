<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryVehicle extends Model
{
    use HasFactory;

    protected $table = 'temporary_vehicles';
    protected $fillable =[
        'location_id',
        'vin',
        'vehicle_id',
        'make',
        'model',
        'model_year',
        'product_type',
        'body',
        'series',
        'drive',
        'engine_displacement',
        'engine_power_kw',
        'engine_power_hp',
        'fuel_type_primary',
        'transmission',
        'number_of_gears',
        'manufacturer',
        'manufacturer_address',
        'plant_city',
        'plant_company',
        'plant_country',
        'production_stopped',
        'engine_compression_ratio',
        'engine_cylinder_bore_mm',
        'engine_cylinders',
        'engine_cylinders_position',
        'engine_position',
        'engine_rpm',
        'engine_stroke_m',
        'engine_torque_rpm',
        'engine_turbine',
        'valve_train',
        'fuel_capacity',
        'fuel_consumption_combined',
        'fuel_consumption_extra_Urba',
        'fuel_consumption_Urban',
        'fuel_system',
        'valves_per_cylinder',
        'number_of_doors',
        'number_of_seat_rows',
        'number_of_seats',
        'front_brakes',
        'rear_brakes',
        'steeering',
        'steering_tyype',
        'rear_suspension',
        'front_suspension',
        'drag_coefficient',
        'wheel_rims_size',
        'wheel_rims Size_array',
        'wheel_size',
        'wheel_size_array',
        'wheelbase',
        'wheel_base_array',
        'height',
        'lenght',
        'width',
        'width_including mirrors',
        'track_front',
        'track_rear',
        'acceleration',
        'max_speed',
        'minimum_turning_circle',
        'minimum_trunk_capacity',
        'weight_empty_kg',
        'abs',
        'check_digit',
        'sequential_number',
        'trim',
        'fuel_type_secondary',
        'engine_model',
        'transmission_full',
        'plant_state',
        'market',
        'made_date',
        'production_started',
        'interior_color_id',
        'exterior_color_id',
        'price',
        'miles',
        'available',
        'show',
        'description',
        'slug',
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
