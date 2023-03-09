<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';


    /**+-------------+
     * | Relaciones |
     * +------------+
     */

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function model()
    {
        return $this->belongsTo(Modell::class);
    }

    /** Funciones de Apoyo */

    public function can_be_delete(){
        return true;
    }



    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
     */


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

    public function scopeModelYear($query, $value)
    {

        if($value){
            $value=trim($value);
            $query->where('model_year', $value);
        }
    }

}
