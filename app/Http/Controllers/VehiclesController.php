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

        $phtoto = $request->file('file');
        $photoName = $phtoto->getClientOriginalName();
        $phtoto->move(public_path('images'),$photoName);

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
        $photo->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }

        return redirect()->route('vehicles-photos', [$photo->vehicle->id]);

    }
}
