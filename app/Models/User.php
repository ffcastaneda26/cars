<?php

namespace App\Models;

use App\Traits\UserTrait;
use Laravel\Sanctum\HasApiTokens;

use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * class User extends Authenticatable implements MustVerifyEmail
 * Se quitó la implementaci´no de verificar  el correo
 */
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
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret'];

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

    public function setFirstNamehAttribute($value)
    {
        $this->attributes['first_name'] =  ucwords(strtolower($value));
    }

    public function setLastNamehAttribute($value)
    {
        $this->attributes['lastname'] =  ucwords(strtolower($value));
    }


    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    protected function Email(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>strtolower($value),
        );
    }


    /*+-------------+
      | Relaciones  |
      +-------------+
    */

    public function dealers(): BelongsToMany
    {
		return $this->belongsToMany(Dealer::class);
	}

    public function locations(): BelongsToMany
    {
		return $this->belongsToMany(Location::class);
	}

    // Vehiculos
    public function favorites(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }


    /*+-------------+
      | De Apoyo    |
      +-------------+
    */


    public function can_be_delete(){
        return true;
    }

    public function isActive()
    {
        return $this->active;
    }

    // ¿Tiene asignada una sucursal?
    public function hasLocation($location_id){
        foreach($this->locations as $location){
            if($location->id == $location_id){
                return true;
            }
        }
        return false;
	}

        /*+-----------------+
        | Búsquedas         |
        +-------------------+
        */

    public function scopeUser($query, $valor)
    {
        if (trim($valor) != '') {
            $query->where('first_name', 'LIKE', "%$valor%")
                ->orwhere('last_name', 'LIKE', "%$valor%")
                ->orwhere('email', 'LIKE', "%$valor%")
                ->orwhere('phone', 'LIKE', "%$valor%");
        }
    }


}
