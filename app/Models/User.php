<?php

namespace App\Models;

use App\Models\Role;
use App\Traits\UserTrait;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use UserTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'oauth_id',
        'oauth_type',
        'is_company',
        'active'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /*  +-----------------+
        | Relaciones      |
        +-----------------+
    */

    // Roles
    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


	public function companies(): BelongsToMany
    {
		return $this->belongsToMany(Company::class);
	}


      public function jobs(): HasMany
    {
        return $this->hasMany(Job::class,'created_by_id');
    }



    /*+------------+
      | Busquedas   |
      +-------------+
    */
    public function scopeUser($query,$valor)
    {
        if($valor) $valor = trim($valor);
        if ( $valor != "") {
            $query->where('name','LIKE',"%$valor%")
                  ->orwhere('email','LIKE',"%$valor%")
                  ->orwhere('phone','LIKE',"%$valor%");
         }
    }


}
