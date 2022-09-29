<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Promotion;
use App\Models\Questionx;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PromotionQuestions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;

    public $promotions;
    public $promotion_id,$promotion = null;

    public function mount() {
        $this->authorize('hasaccess', 'promotion-question.index');
        $this->manage_title = "Manage Questions by Promotion";
        $this->search_label = "Question";
        $this->view_index = 'livewire.configuration.promotions_index';
        $this->view_list  = 'livewire.configuration.promotions_list';
        $this->view_search  = 'livewire.configuration.promotions_search';
        if (App::isLocale('en')) {
            $this->promotions= Promotion::orderby('english')->get();
        } else {
            $this->promotions= Promotion::orderby('spanish')->get();
        }
	}

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        $this->show_only_linked = false;
        if ($this->promotion_id && ($this->promotion && $this->promotion->questions()->count())){
            $this->show_only_linked = true;
        } else {
            $this->only_linked = false;
        }

        if ($this->only_linked) {
            if (App::isLocale('en')) {
                return view('livewire.configuration.index', [
                    'records' => $this->promotion->questions()->Question($searchTerm)->orderby('english')->paginate($this->per_page),
                ]);
            }
            return view('livewire.configuration.index', [
                'records' => $this->promotion->questions()->Question($searchTerm)->orderby('spanish')->paginate($this->per_page),
            ]);

        }

        if (App::isLocale('en')) {
            return view('livewire.configuration.index', [
                'records' => Questionx::Question($searchTerm)->Orderby('english')->paginate($this->per_page),
            ]);
        }

        return view('livewire.configuration.index', [
            'records' => Questionx::Question($searchTerm)->Orderby('spanish')->paginate($this->per_page),
        ]);
    }

    public function readPromotion() {
        if ($this->promotion_id) {
            $this->promotion = Promotion::findOrFail($this->promotion_id);
        }else{
            $this->promotion = null;
        }
    }

    public function linkRecord($id){
        $this->promotion->questions()->detach($id);
        $this->promotion->questions()->attach($id);
        $this->readPromotion();
    }

    public function unlinkRecord($id){
        $this->promotion->questions()->detach($id);
        $this->readPromotion();
    }

}
