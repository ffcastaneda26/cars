<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Dealer;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\LocationUser;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InterestedUsers extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;

    public $user_locations;

    public function mount()
    {
        $this->authorize('hasaccess', 'interested_users.index');
        $this->manage_title = __('Interested Users');
        $this->search_label = __('Name, Email or Phone');
        $this->view_form    = 'livewire.intesrested_users.form';
        $this->view_table   = 'livewire.intesrested_users.table';
        $this->view_list    = 'livewire.intesrested_users.list';
        $this->allow_create = false;
        $this->user_locations= LocationUser::select('location_id')
                                            ->Where('user_id',Auth::user()->id)
                                            ->orderBy('location_id')
                                            ->get()
                                            ->toArray();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $user_locations= LocationUser::select('location_id')
        ->Where('user_id',Auth::user()->id)
        ->orderBy('location_id')
        ->get()
        ->toArray();
    
        $records = User::wherehas('interested_vehicles',function($query) use ($user_locations){
                                                $query->wherehas('location',function($query) use ($user_locations){
                                                    $query->wherein('id',$user_locations);
                                                });
                                            })
                        ->User($this->search)
                        ->orderby($this->sort,$this->direction)
                        ->paginate($this->pagination);
        return view('livewire.index',compact('records'));

    }

    


}
