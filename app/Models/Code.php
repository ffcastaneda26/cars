<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Code extends Model
{
    use HasFactory;
    protected $table = 'codes_company';
    public $timestamps = false;
    protected $fillable =  [
        'process_code_company_id',
        'code'
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function ProcessCodeCompany():BelongsTo
     {
        return $this->belongsTo(ProcessCodeCompany::class);
     }



    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
            return true;
    }


    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */

    public function scopeCode($query,$valor){
        $valor=trim($valor);
        $query->where('code',$valor);
    }


}
