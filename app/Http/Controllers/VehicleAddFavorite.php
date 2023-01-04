<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleAddFavorite extends Controller
{
    public function add_to_my_favorites(Vehicle $vehicle){
        if(!$vehicle->hasUser()){
            $vehicle->interested()->attach(Auth::user()->id,['status_id' => null,'user_updated_id'=> null]);
        }
        return redirect()->route('vehicle-search');
    }

}
