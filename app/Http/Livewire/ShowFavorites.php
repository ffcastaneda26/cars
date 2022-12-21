<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowFavorites extends Component
{

    protected $listeners = ['total_my_favorites'];

    public $show_my_favorites = false;
    public $total_my_favorites;

    public function render()
    {
        $this->total_my_favorites();
        return view('livewire.search.show-favorites');
    }


    public function total_my_favorites(){
        $this->total_my_favorites = 0;
        if(!Auth::check()){
            return 0;
        }
        $this->total_my_favorites = Auth::user()->favorites->count();
    }




}
