<?php

namespace App\Models;

use App\Enum\JobTurnEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $fillable =  [
        'company_id',
        'name',
        'position_id',
        'salary_type_id',
        'time_type_id',
        'show_salary_by',
        'min_salary',
        'max_salary',
        'amount_salary',
        'salary_periodicity',
        'address',
        'zipcode',
        'longitude',
        'latitude',
        'shift',
        'complete_address',
        'years_experience',
        'mandatory_experience',
        'times_hire_id',
        'quantity_jobs',
        'remote',
        'show_address',
        'applicants_send_cv',
        'notify_daily_applications',
        'notify_each_application',
        'mandatory_english',
        'complies_legal_requirements',
        'active',
        'description',
        'benefits',
        'covid_precautions',
        'created_by_id',
        'posted_on',
    ];

    protected $casts = [
        'role' =>JobTurnEnum::class
    ];

    /*+-----------------+
      | Relaciones      |
      +-----------------+
     */

	public function company(): BelongsTo
    {
		return $this->belongsTo(company::class);
	}

    public function position(): BelongsTo
    {
		return $this->belongsTo(Position::class);
	}

    public function salaryType(): BelongsTo
    {
		return $this->belongsTo(SalaryType::class);
	}

    public function timeType(): BelongsTo
    {
		return $this->belongsTo(TimeType::class);
	}

    public function cretedby(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by_id');
    }


    /*+-----------------+
      | Funciones Apoyo |
      +-----------------+
     */

    public function can_be_delete(){
        return true;
    }

   /*+------------------+
      | Búsquedas       |
      +-----------------+
     */


     public function scopeName($query,$valor)
     {
        $valor = trim($valor);

        if($valor){
            $query->where('name','LIKE',"%$valor%");
        }

     }
}
