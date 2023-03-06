<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function vehicle_photos(Vehicle $vehicle)
    {

        return view('livewire.vehicles.photos',compact('vehicle'));
    }


    public function photoStore(Request $request)
    {

        // TODO: Guardar en Storage en lugar de carpeta publica
        $photo      = $request->file('file');
        $photoName = $photo->getClientOriginalName();
        $photo->move(public_path('images/vehicles/photos'),$photoName);

        // Crea registro de foto y la asocia al vehiculo
        $photoLoad = new Photo();
        $photoLoad->path = $photoName;
        $photoLoad->vehicle_id = $request->get('vehicle_id');
        $photoLoad->save();

        return response()->json(['success'=>$photoName]);
    }


    public function destroyPhoto(Request $request)
    {
        $photo = Photo::findOrFail($request->photo);
        $filename =  $photo->path;
        if(str_contains($filename, 'storage/vehicles/photos/')){
            $path=$filename;
        }else{
            $path=public_path().'/images/vehicles/photos/'.$filename;
        }

        if (file_exists($path)) {
            $photo->delete();
            unlink($path);
        }

        if(str_contains($filename, 'storage/vehicles/photos/')){
            return redirect()->route('vehicle-photos-multiple', [$photo->vehicle->id]);
        }else{
            return redirect()->route('vehicles-photos', [$photo->vehicle->id]);
        }

    }
}
