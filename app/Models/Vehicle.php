<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
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

    public function color_exterior()
    {
        return $this->belongsTo(Color::class, 'color_exterior_id', 'id');
    }

    public function color_interior()
    {
        return $this->belongsTo(Color::class, 'color_interior_id', 'id');
    }



    /** Funciones de Apoyo */

    public function can_be_delete()
    {
        return true;
    }

    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
     */
    public function scopelocation_id($query, $value)
    {
        $query->where('location_id', 'LIKE', "%$value%");
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
    public function scopeEngineDisplacement($query, $value)
    {
        $query->where('engine_displacement', 'LIKE', "%$value%");
    }
    public function scopeeEginePowerKw($query, $value)
    {
        $query->where('enginePowerKw', 'LIKE', "%$value%");
    }
    public function scopeeEginePowerHp($query, $value)
    {
        $query->where('engine_power_hp', 'LIKE', "%$value%");
    }
    public function scopeFuelPrimary($query, $value)
    {
        $query->where('fuel_tpe_primary', 'LIKE', "%$value%");
    }
    public function scopeFuelSecondary($query, $value)
    {
        $query->where('fuel_type_secondary', 'LIKE', "%$value%");
    }
    public function scopeEnginemodel($query, $value)
    {
        $query->where('engine_model', 'LIKE', "%$value%");
    }
    public function scopeTransmission($query, $value)
    {
        $query->where('transmission', 'LIKE', "%$value%");
    }
    public function scopeTransmissionFull($query, $value)
    {
        $query->where('transmission_full', 'LIKE', "%$value%");
    }
    public function scopenumber_of_gears($query, $value)
    {
        $query->where('number_of_gears', 'LIKE', "%$value%");
    }
    public function scopeColor($query, $value)
    {
        $query->where('color_exterior_id', 'LIKE', "%$value%")
               ->orwhere('color_interior_id', 'LIKE', "%$value%");
    }

    public function scopeDescription($query, $value)
    {
        $query->where('description', 'LIKE', "%$value%");
    }
    public function scopePrice($query, $value)
    {
        $query->where('price', 'LIKE', "%$value%");
    }

    public function scopeSlug($query, $value)
    {
        $query->where('slug', 'LIKE', "%$value%");
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
