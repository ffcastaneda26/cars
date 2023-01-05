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
    protected $fillable =[
        'vin',
        'location_id',
        'material_id',
        'interior_color_id',
        'exterior_color_id',
        'price',
        'miles',
        'available',
        'show',
        'premium',
        'description',
    ];

    /**+-------------+
     * | Relaciones |
     * +------------+
     */

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function interior_color()
    {
        return $this->belongsTo(Color::class, 'interior_color_id', 'id');
    }

    public function exterior_color()
    {
        return $this->belongsTo(Color::class, 'exterior_color_id', 'id');
    }

    // Usuarios interesados en este vehículo (favoritos o que se contacten)
    public function interested(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
                    ->as('interested')
                    ->withPivot('status_id','user_updated_id')
                    ->wherePivot('type', 'favorite')
                    ->withTimesTamps();
    }

    public function interested_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
                    ->as('interested')
                    ->withPivot('status_id','user_updated_id')
                    ->wherePivot('type', 'contact')
                    ->withTimesTamps();
    }
    

    public function user_favorites():BelongsToMany
    {
        return $this->belongsToMany(User::class)
                ->as('interested')
                ->withPivot('status_id','user_updated_id')
                ->wherePivot('type', 'favorite')
                ->withTimesTamps();

    }




    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
    /** Funciones de Apoyo */

    public function can_be_delete()
    {
        return true;
    }

    public function total_photos()
    {
        return $this->photos->count();
    }

    /** ¿Puede seguir agregando fotos */

    public function can_add_photos(){

        return $this->location->dealer->package->max_photos_by_vehicle > $this->total_photos();
    }

    public function max_photos_allowed()
    {
        return $this->location->dealer->package->max_photos_by_vehicle - $this->total_photos();
    }


    /** Es premium */
    public function is_premium(){
        return $this->premium;
    }
    /** Mostrar foto */
    public function show_photo()
    {
        return $this->location->dealer->package->show_photo;
    }

    /** Mostrar Precio */

    public function show_price()
    {
        return $this->location->dealer->package->show_prices;
    }

    /** Mostrar localidad */

    public function show_location()
    {
        return $this->location->dealer->package->show_locations;
    }

    /** Contar Click */
    public function count_clicks()
    {
        return $this->location->dealer->package->count_clicks_in_vehicle;

    }

    /** Contar fotos */

    public function count_photos()
    {
        return $this->location->dealer->package->count_photos_see;

    }

    /** Agregar a favoritos */
    public function add_favorites()
    {
        return $this->location->dealer->package->add_to_favorites;

    }

    /** Acceso a usuarios interesados */
    public function access_interested_users()
    {
        return $this->location->dealer->package->access_interested_users;
    }

    /** ¿Está como favorito para un usuario? */

    // TODO: Cambiar por isFavorite
    public function hasUser($user_id=null){
        // No trae usuario y no está conectado regresa falso
        if(is_null($user_id)){
            if(Auth::check()){
                $user_id = Auth::user()->id;
            }else{
                return false;
            }
        }

        foreach($this->user_favorites as $user_favorite){
            if($user_favorite->id == $user_id){
                return true;
            }
        }
        return false;
	}

    // ¿Está el vehículo asociado al usaurio como interesado?
        public function isInterested($user_id=null){
        // No trae usuario y no está conectado regresa falso
        if(is_null($user_id)){
            if(Auth::check()){
                $user_id = Auth::user()->id;
            }else{
                return false;
            }
        }

        return $this->belongsToMany(User::class)
                    ->as('interested')
                    ->using(UserVehicle::class)
                    ->withPivot('status_id','user_updated_id')
                    ->wherePivot('type', 'contact')
                    ->wherePivot('user_id',$user_id)
                    ->withTimesTamps()
                    ->first();

  	}



    /** Mostrar Etiquetas */
    public function show_tags()
    {
        return $this->location->dealer->tags->count();
    }

    /** Leer las etiquetas aleatoriamente */
    // TODO: La cantidad de etiquetas configuralas a nivel distribuidor (Dealer)
    public function read_tags_to_show($total_tags=1)
    {
       return  $this->location->dealer->tags->random($total_tags);


    }
    /**+----------------------------------------+
     * | Búsquedas x diferentes criterios       |
     * +----------------------------------------+
     */

     public function scopeSearchFull($query,$value){
        if($value) {
            $value = trim($value);
            $query->where(DB::raw("CONCAT(make,model,model_year,body)"), 'LIKE', "%$value%");

        }
    }

    public function scopevin($query, $value)
    {
        $query->where('vin', $value);
    }

    public function scopeBrand($query, $value)
    {

        $query->where('make', 'LIKE', "%$value%");
    }
    public function scopeModel($query, $value)
    {
        $query->where('model', 'LIKE', "%$value%");

    }

    public function scopeModelYear($query, $value)
    {
        if($value){
            $value=trim($value);
            $query->where('model_year', 'LIKE', "%$value%")
                    ->orWhereNull('model_year');
        }
    }


    public function scopeBody($query, $value)
    {
        if($value){
            $value=trim($value);
            $query->where('body', 'LIKE', "%$value%")
                    ->orWhereNull('body');
        }
    }
    public function scopeTrim($query, $value)
    {
        $query->where('trim', 'LIKE', "%$value%");
    }


    public function scopeseries($query, $value)
    {
        $query->where('series', 'LIKE', "%$value%");
    }
    public function scopeDrive($query, $value)
    {
        $query->where('drive', 'LIKE', "%$value%");
    }
    public function scopeEnginecylinders($query, $value)
    {
        $query->where('engine_cylinders', 'LIKE', "%$value%");
    }

    public function scopeNumberDoors($query, $value)
    {
        $query->where('number_of_doors', 'LIKE', "%$value%");
    }
    public function scopeNumberSeatrows($query, $value)
    {
        $query->where('number_of_seat_rows', 'LIKE', "%$value%");
    }
    public function scopeNumberseats($query, $value)
    {
        $query->where('number_of_seats', 'LIKE', "%$value%");
    }
    public function scopeSteeering($query, $value)
    {
        $query->where('steeering', 'LIKE', "%$value%");
    }

    public function scopeFue($query, $value)
    {
        $query->where('fuel_type_primary', 'LIKE', "%$value%")
              ->orwhere('fuel_type_secondary', 'LIKE', "%$value%");
    }



    public function scopeTransmission($query, $value)
    {
        $query->where('transmission', 'LIKE', "%$value%");
    }

    public function scopeColor($query, $value)
    {
        $query->where('exterior_color_id', 'LIKE', "%$value%")
               ->orwhere('interior_color_id', 'LIKE', "%$value%");
    }


    public function scopeColorExterior($query, $value)
    {
        $query->where('exterior_color_id', 'LIKE', "%$value%");
    }


    public function scopeMiles($query, $miles_from,$miles_to)
    {
        $query->wherebetween('miles', [$miles_from,$miles_to]);

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
