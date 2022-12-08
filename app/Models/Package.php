<?php

namespace App\Models;

use App\Enums\PhotoRotationEnum;
use App\Enums\TeamCuervoPhotoUploadEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'max_show_vehicles_per_location',
        'photo_rotation',
        'phone_number_listing_per_location',
        'company_web_site_listing',
        'locations_allowed',
        'self_service_photo_upload',
        'team_cuervo_photo_upload',
        'tag_higlights',
        'max_tags_higlights',
        'premium_tag_search',
        'add_to_favorites',
        'notify_add_to_favorites',
        'access_interested_users',
        'inventory_integratgion',
        'price_additional_location',
        'vehicle_listing_bonus',
        'max_photos_by_vehicle',
        'max_photos_by_location',
        'search_by_tags',
        'show_prices',
        'show_locations',
        'count_clicks_in_vehicle',
        'count_time_see_vehicle',
        'count_photos_see',
        'use_order_to_search'
    ];

    protected $casts = [
        'photo_rotation'            => PhotoRotationEnum::class,
        'team_cuervo_photo_upload'  => TeamCuervoPhotoUploadEnum::class

    ];
    /**+----------------+
       | Relaciones     |
       +----------------+
     */

     public function dealers(): HasMany
     {
        return $this->hasMany(Dealer::class);
     }

    /** Funciones de Apoyo */

    public function can_be_delete(){
        if($this->dealers()->count()){ return false;}
        return true;
    }

    /**+------------+
       | Búsquedas  |
       +------------+
    */

    public function scopeName($query, $valor) {
        if (trim($valor) != "") {
            $query->where('name', 'LIKE', "%$valor%");
        }
    }


}
