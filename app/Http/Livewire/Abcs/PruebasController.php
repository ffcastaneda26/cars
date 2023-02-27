<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Color;
use App\Models\LocationUser;
use App\Models\TemporaryVehicle;
use App\Models\Vehicle;
use App\Traits\ApiVehiclesTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class PruebasController extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;





    public function mount()
    {
        $this->manage_title     = __('Search') . ' ' . __('Vehicles');
        $this->search_label     = __('Make,Model,Year....');
        $this->view_search      = 'livewire.searching.search';
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $records = Vehicle::SearchFull($this->search)
                        ->orderby($this->sort,$this->direction)
                         ->paginate($this->pagination);

        return view('livewire.searching.index',compact('records'))->layout('layouts.prueba_template');

    }


}

