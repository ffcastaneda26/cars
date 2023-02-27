<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Role;
use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Permission;

use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DealerTags extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    public $tags,$tag,$tag_id;
    public $dealer;
    public $max_tags_allowed;
    public $disable_link_button=true;

    public function mount()
    {
        $this->authorize('hasaccess', 'dealer_tags.index');
        $this->manage_title = "Select Tags";
        $this->search_label = "Tag";
        $this->read_tags();
        $this->max_tags_allowed = Auth::user()->dealers->first()->package->max_tags_higlights;
    }

    public function render()
    {

        $this->dealer = Auth::user()->dealers->first();
        $this->disable_link_button = $this->dealer->tags->count() >= $this->max_tags_allowed ;
        if(App::isLocale('en')){
            $records = Tag::orderby('english')->paginate($this->pagination);
        }else{
            $records = Tag::orderby('spanish')->paginate($this->pagination);
        }
        return view('livewire.dealers.tags', compact('records'));
    }


    public function read_tags(){
        $this->tags = null;
        $this->tags = Tag::all();
    }
    public function linkRecord($id)
    {
        $this->dealer->tags()->detach($id);
        $this->dealer->tags()->attach($id);

    }

    public function unlinkRecord($id)
    {
        $this->dealer->tags()->detach($id);
        // return back();

    }
}
