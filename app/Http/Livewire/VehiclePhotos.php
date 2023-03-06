<?php


namespace App\Http\Livewire;


use App\Models\Make;
use App\Models\Photo;
use App\Models\Dealer;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithFileUploads;
use App\Traits\VariablesTrait;
use App\Http\Livewire\Traits\CrudTrait;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VehiclePhotos extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    use CrudTrait;
    use UserTrait;
    use VariablesTrait;

    public $photos = [];
    public $vehicle = null;


    protected $rules = [
        'photos.*'   => 'required',
    ];

    public function mount(Vehicle $vehicle)
    {
        if($vehicle){
            $this->vehicle = $vehicle;
        }
        $this->authorize('hasaccess', 'vehicles.index');
        $this->manage_title = __('Manage') . ' ' . __('Photos');

    }

    public function render()
    {
        return view('livewire.vehicles.vehicle-photos');
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        foreach($this->photos as $key => $photo){
            $photo_save =  new Photo();
            $photo_save->vehicle_id = $this->vehicle->id;
            $photoName = time() .'_'.$photo->getClientOriginalName();
            $photo_save->path       = 'storage/' . $photo->storeAs('vehicles/photos',$photoName,'public');
            // $photo_save->path       = 'storage/' . $photo->store('vehicles/photos','public');
            $photo_save->save();
            $this->reset('photos');
            $this->vehicle = Vehicle::findOrFail($this->vehicle->id);
        }
    }


}


