<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use App\Models\Dealer;
use App\Models\Status;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\UserVehicle;
use App\Models\LocationUser;
use App\Traits\ZipCodeTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
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
    public $statuses;
    public $user;
    public $status_id;

    public function mount()
    {
        $this->authorize('hasaccess', 'interested_users.index');
        $this->manage_title = __('Interested Users');
        $this->search_label = __('Name, Email or Phone');
        $this->view_form    = 'livewire.intesrested_users.form';
        $this->view_table   = 'livewire.intesrested_users.table';
        $this->view_list    = 'livewire.intesrested_users.list';
        $this->allow_create = false;
        $this->statuses = App::isLocale('en') ? Status::select('id','english')->orderby('english')->get()
                                            : Status::select('id','spanish')->orderby('spanish')->get();

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
        // $user_locations= LocationUser::select('location_id')
        //                 ->Where('user_id',Auth::user()->id)
        //                 ->orderBy('location_id')
        //                 ->get()
        //                 ->toArray();

        // $records = User::With('interested_vehicles')
        //                 ->wherehas('interested_vehicles',function($query) use ($user_locations){
        //                                         $query->wherehas('location',function($query) use ($user_locations){
        //                                             $query->wherein('id',$user_locations);
        //                                         });
        //                                     })
        //                 ->User($this->search)
        //                 ->orderby($this->sort,$this->direction)
        //                 ->paginate($this->pagination);
        $sql = "SELECT usu.id ";
        $sql .= "FROM users as usu,locations as loc,vehicles as veh,location_user as lou,user_vehicle as usv ";
        $sql .= "WHERE usu.id = lou.user_id";
        $sql .= "  AND usu.id = usv.user_id";
        $sql .= "  AND loc.id = veh.location_id";
        $sql .= "  AND veh.id = usv.vehicle_id";
        $sql .= "  AND loc.id IN (";
         foreach($this->user_locations as $user_location){
            $sql.= $user_location['location_id'] . ",";
         }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql.= ")";

        $records = DB::select($sql);
        $interested_users = array();
        foreach ($records as $record) {
            array_push($interested_users,$record->id);
        }
$records = User::whereIn('id',$interested_users)->paginate($this->pagination);

        return view('livewire.index',compact('records'));

    }


    /*+---------+
      | Editar  |
      +---------+
    */

    public function edit(User $user)
    {

        $this->record_id = $user->id;
        $this->user = $user;
        $this->status_id = $this->user->first_interested_vehicle()->interested->status_id;
        $this->openModal();

    }

    /*+-------------+
      | Atualizar   |
      +-------------+
     */

    public function store(){
        $this->validate([
            'status_id' =>'required|exists:statuses,id',
        ]);

        try {
            UserVehicle::where('user_id', $this->user->id)
                        ->where('type', 'contact')
                        ->update(['status_id' => $this->status_id,
                                'user_updated_id' => Auth::user()->id
                                ]);

            $this->store_message(__('Interested') );


        } catch (Exception $e) {
            $message = $e->getMessage();
            session()->flash('message',  $message);

        }

    }

    public function resetInputFields()
    {
        $this->reset('status_id','user');
        $this->resetErrorBag();
    }

}
