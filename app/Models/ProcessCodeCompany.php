<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcessCodeCompany extends Model
{
    use HasFactory;
    protected $table = 'process_codes_company';
    public $timestamps = false;
    protected $fillable =  [
        'company_id',
        'user_id',
        'total_codes',
        'printed'
    ];


    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

     public function Company():BelongsTo
     {
        return $this->belongsTo(Company::class);
     }

     public function User():BelongsTo
     {
        return $this->belongsTo(User::class);
     }


     public function Codes():HasMany
     {
        return $this->hasMany(Code::class);
     }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        if($this->codes()->count()) return false;
        return true;
    }

    public function isPrinted(){
        return $this->printed;
    }

    /*+-------------------+
      | Búsquedas         |
      +-------------------+
    */



}

