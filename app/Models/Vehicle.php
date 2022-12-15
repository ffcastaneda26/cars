<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
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
     * | Relaciones |
     * +------------+
     */

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function interior_color()
    {
        return $this->belongsTo(Color::class, 'interior_color_id', 'id');
    }

    public function exterior_color()
    {
        return $this->belongsTo(Color::class, 'exterior_color_id', 'id');
    }



    /** Funciones de Apoyo */

    public function can_be_delete()
    {
        return true;
    }

    public function total_photos()
    {
        return $this->photos->count();
    }

    /** ¿Puede seguir agregando fotos */

    public function can_add_photos(){

        return $this->location->dealer->package->max_photos_by_vehicle > $this->total_photos();
    }

    public function max_photos_allowed(){

        return $this->location->dealer->package->max_photos_by_vehicle - $this->total_photos();
    }
    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
     */

     public function scopeSearchFull($query,$value){
        if($value) {
            $value = trim($value);
            $query->where('make', 'LIKE', "%$value%")
                    ->orwhere('model', 'LIKE', "%$value%")
                    ->orwhere('model_year', 'LIKE', "%$value%")
                    ->orwhere('product_type', 'LIKE', "%$value%")
                    ->orwhere('body', 'LIKE', "%$value%")
                    ->orwhere('series', 'LIKE', "%$value%")
                    ->orwhere('drive', 'LIKE', "%$value%")
                    ->orwhere('miles', 'LIKE', "%$value%")
                    ->orwhere('price', 'LIKE', "%$value%");
        }

    }

    public function scopevin($query, $value)
    {
        $query->where('vin', $value);
    }

    public function scopeMake($query, $value)
    {
        $query->where('make', 'LIKE', "%$value%");
    }
    public function scopeModel($query, $value)
    {
        $query->where('model', 'LIKE', "%$value%");
    }
    public function scopeModelYear($query, $value)
    {
        $query->where('model_year', 'LIKE', "%$value%");
    }
    public function scopeProductType($query, $value)
    {
        $query->where('product_type', 'LIKE', "%$value%");
    }
    public function scopebody($query, $value)
    {
        $query->where('body', 'LIKE', "%$value%");
    }
    public function scopeTrim($query, $value)
    {
        $query->where('trim', 'LIKE', "%$value%");
    }
    public function scopeseries($query, $value)
    {
        $query->where('series', 'LIKE', "%$value%");
    }
    public function scopeDrive($query, $value)
    {
        $query->where('drive', 'LIKE', "%$value%");
    }
    public function scopeEnginecylinders($query, $value)
    {
        $query->where('engine_cylinders', 'LIKE', "%$value%");
    }

    public function scopeNumberDoors($query, $value)
    {
        $query->where('number_of_doors', 'LIKE', "%$value%");
    }
    public function scopeNumberSeatrows($query, $value)
    {
        $query->where('number_of_seat_rows', 'LIKE', "%$value%");
    }
    public function scopeNumberseats($query, $value)
    {
        $query->where('number_of_seats', 'LIKE', "%$value%");
    }
    public function scopeSteeering($query, $value)
    {
        $query->where('steeering', 'LIKE', "%$value%");
    }

    public function scopeFue($query, $value)
    {
        $query->where('fuel_type_primary', 'LIKE', "%$value%")
              ->orwhere('fuel_type_secondary', 'LIKE', "%$value%");
    }



    public function scopeTransmission($query, $value)
    {
        $query->where('transmission', 'LIKE', "%$value%");
    }

    public function scopeColor($query, $value)
    {
        $query->where('color_exterior_id', 'LIKE', "%$value%")
               ->orwhere('color_interior_id', 'LIKE', "%$value%");
    }



    public function scopeMiles($query, $value)
    {
        $query->where('miles', 'LIKE', "%$value%");
    }
    public function scopeAvailable($query, $available=true)
    {
        $query->where('available', $available);
    }
    public function scopeShow($query, $show=true)
    {
        $query->where('show', $show);
    }


}
