<?php

namespace App\Models;

use App\Traits\UserTrait;
use Laravel\Sanctum\HasApiTokens;

use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'password', 'active'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret', 'active', 'zipcode'];

    /**
     * The attributes that should be cast to native types.
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
    protected $appends = ['profile_photo_url'];

    // Setters
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
        /*+-----------------+
        | De Apoyo          |
        +-------------------+
        */

    public function isActive()
    {
        return $this->active;
    }

        /*+-----------------+
        | Búsquedas         |
        +-------------------+
        */

    public function scopeUser($query, $valor)
    {
        if (trim($valor) != '') {
            $query->where('name', 'LIKE', "%$valor%")->orwhere('email', 'LIKE', "%$valor%");
        }
    }
}
