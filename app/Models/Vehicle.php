<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $fillable = [
        'dealer_id',
        'make_id',
        'modell_id',
        'status_id',
        'style_id',
        'color_exterior_id',
        'color_interior_id',
        'transmission_id',
        'drivetrain_id',
        'trim_id',
        'fuel_id',
        'description',
        'price',
        'miles',
        'inventory',
        'available',
        'show',
        'vin'


    ];
    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function dealer() {
        return $this->belongsTo(Dealer::class);
    }

    public function make() {
        return $this->belongsTo(Make::class);
    }

    public function modell() {
        return $this->belongsTo(Modell::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function style() {
        return $this->belongsTo(Style::class);
    }

    public function color_exterior() {
        return $this->belongsTo(Color::class,'color_exterior_id','id');
    }

    public function color_interior() {
        return $this->belongsTo(Color::class,'color_interior_id','id');
    }

    public function transmission() {
        return $this->belongsTo(Transmission::class);
    }

    public function drivetrain() {
        return $this->belongsTo(Drivetrain::class);
    }

    public function trim() {
        return $this->belongsTo(Trim::class);
    }

    public function Fuel() {
        return $this->belongsTo(Fuel::class);
    }


    /** Funciones de Apoyo */

    public function can_be_delete(){
        return true;
    }

    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
    */

    public function scopMake($query, $valor) {
        $query->where('make_id', $valor);
    }

    public function scopModell($query, $valor) {
        $query->where('modell_id', $valor);
    }

    public function scopStatus($query, $valor) {
        $query->where('status_id', $valor);
    }

    public function scopStyle($query, $valor) {
        $query->where('style_id', $valor);
    }

    public function scopColorExterior($query, $valor) {
        $query->where('color_exterior_id', $valor);
    }

    public function scopColorInterior($query, $valor) {
        $query->where('color_interior_id', $valor);
    }

    public function scopTransmission($query, $valor) {
        $query->where('transmission_id', $valor);
    }


    public function scopTrain($query, $valor) {
        $query->where('train_id', $valor);
    }

    public function scopTrim($query, $valor) {
        $query->where('trim_id', $valor);
    }

    public function scopFuel($query, $valor) {
        $query->where('fuel_id', $valor);
    }

    public function scopPrice($query, $valor) {
        $query->where('price', $valor);
    }
}
