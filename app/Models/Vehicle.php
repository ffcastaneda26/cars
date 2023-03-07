<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model

{
    use HasFactory;

    protected $table = 'vehicles';


    /**+-------------+
     * | Relaciones |
     * +------------+
     */


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }
    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function model()
    {
        return $this->belongsTo(Modell::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }
    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->photos()->count()){ return false;}
        return true;
    }

    public function total_photos(){
        return $this->photos()->count();
    }



    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
     */

     public function scopeComplete($query,$value){
        if($value) {
            $value = trim($value);
            $query->where(DB::raw("CONCAT(dealer_id,make_id,model_id,style_id,model_year,body)"), 'LIKE', "%$value%");

        }
    }

    public function scopeDistribuidor($query, $value)
    {
        if($value){
            $query->where('dealer_id', $value);
        }

    }

    public function scopeBrand($query, $value)
    {
        if($value){
            $query->where('make_id', $value);
        }
    }

    public function scopeModel($query, $value)
    {
        if($value){
            $query->where('model_id', $value);
        }
    }

    public function scopeStyleSearch($query, $value)
    {

        if($value){
            $value=trim($value);
            $query->where('style_id', $value);
        }

    }

    public function scopeModelYear($query, $value)
    {

        if($value){
            $value=trim($value);
            $query->where('model_year', $value);
        }
    }


    public function scopeStock($query, $value)
    {
        if($value){
            $value=trim($value);
            $query->where('stock','LIKE', "%$value%");
        }
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
