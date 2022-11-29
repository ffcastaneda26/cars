<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'dealer_id',
        'vin',
        'stock',
        'year',
        'make',
        'model',
        'exterior_color',
        'interior_color',
        'mileage',
        'transmission',
        'engine',
        'retail_price',
        'sales_price',
        'options',
        'images',
        'last_updated',
        'body',
        'trim'
    ];

    /**+-----------------------------+
     * | Relaciones entre tablas     |
	 * +-----------------------------+
     */

     // Distribuidor

     public function dealer(): BelongsTo
     {
        return $this->belongsTo(Dealer::class);
     }

    /**+------------+
     * | Búsquedas  |
	 * +------------+
     */


    // Nombre Completo
    public function scopeFullsearch($query,$value)
    {
        if (trim($value) != "") {
            $value =str_replace(' ','%',$value);
            $query->where(DB::raw("CONCAT(make,model)"), 'LIKE', "%$value%");
        }
    }

    // Marca
    public function scopeMake($query,$value)
    {
        if (trim($value) != "") {
            $value =str_replace(' ','%',$value);
            $query->where('make', 'LIKE', "%$value%");
        }
    }

    public function scopeModel($query,$value)
    {
        if (trim($value) != "") {
            $value =str_replace(' ','%',$value);
            $query->where('model', 'LIKE', "%$value%");
        }
    }

    public function scopeYear($query,$value)
    {
        if (trim($value) != "") {
            $value =str_replace(' ','%',$value);
            $query->where('year', 'LIKE', "%$value%");
        }
    }



}
