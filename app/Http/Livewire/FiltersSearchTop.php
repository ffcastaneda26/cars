<?php

namespace App\Http\Livewire;

use App\Models\Make;
use App\Models\Style;
use App\Models\Modell;
use App\Models\Vehicle;
use Livewire\Component;
use App\Traits\VehicleTrait;
use App\Traits\VariablesTrait;
use Illuminate\Support\Facades\DB;

class FiltersSearchTop extends Component
{
    use VehicleTrait;
    use VariablesTrait;

    public $style_route =  null;


    public function mount(){

        $this->fill_combos_fields();
    }


    public function render()
    {

        return view('livewire.search.filters-search-top');

    }


    // Lee la marca para poder  llenar lista de modelos
    public function read_make(){
        if($this->make_id && $this->make_id  != 'null'){
            $this->modelsList=  Modell::select('id','name')
                                ->wherehas('vehicles')
                                ->MakeId($this->make_id)
                                ->withCount('vehicles')
                                ->get();
        }else{
            $this->modelsList     =  Modell::select('id','name')
                                            ->wherehas('vehicles')
                                            ->orderby('name')
                                            ->withCount('vehicles')
                                            ->get();
        }
    }


    // Regresa el valor
    public function fill_combos_fields(){
        // Si trae estilo en la ruta lee el registro de tabla estilos
        if($this->style_route){
            $this->style_route = strtoupper($this->style_route);
            if( $this->style_route == 'PICKUP'){
                $this->style_route = 'PICK-UP';
            }

            $record_style = Style::where('name',$this->style_route)->first();
            if($record_style){
                $this->style_id = $record_style->id;
            }
        }
        $this->yearsList    =  $this->fill_axos_list();
        $this->makesList    =  $this->fill_makes_list($this->model_year,$this->model_id,$this->style_id);
        $this->modelsList   =  $this->fill_models_list($this->model_year,$this->make_id,$this->style_id);
        $this->stylesList   =  $this->fill_styles_list($this->model_year,$this->make_id,$this->model_id);
    }


    // Lista de axos
    public function fill_axos_list($make_id=null,$model_id=null,$style_id=null){
        return Vehicle::select('model_year', DB::raw( 'count(*) as total'))
                        ->Brand($this->make_id)
                        ->Model($this->model_id)
                        ->StyleSearch($this->style_id)
                        ->groupBy('model_year')
                        ->get();
    }

    // Lista Marcas
    public function fill_makes_list($model_year=null,$model_id=null,$style_id=null){
        // Axo - Modelo  - Estilo
        if($model_year && $model_id && $style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year,$model_id,$style_id){
                            $query->where('model_year',$model_year)
                                ->where('model_id',$model_id)
                                ->where('style_id',$style_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Axo y Modelo

        if($model_year && $model_id && !$style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year,$model_id){
                            $query->where('model_year',$model_year)
                                ->where('model_id',$model_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Solo Axo
        if($model_year && !$model_id && !$style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year){
                            $query->where('model_year',$model_year);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Modelo y estilo
        if(!$model_year && $model_id && $style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_id,$style_id){
                            $query->where('model_id',$model_id)
                                ->where('style_id',$style_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Solo Modelo
        if(!$model_year && $model_id && !$style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_id){
                            $query->where('model_id',$model_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Axo y Estilo
        if($model_year && !$model_id && $style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year,$style_id){
                            $query->where('model_year',$model_year)
                                ->where('style_id',$style_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Solo estilo

        if(!$model_year && !$model_id && $style_id){
            return  Make::select('id','name')
                        ->wherehas('vehicles',function($query) use($style_id){
                            $query->where('style_id',$style_id);
                        })
                        ->orderby('name')
                        ->withCount('vehicles')
                        ->get();
        }

        // Todos
        if(!$model_year && !$model_id && !$style_id){
            return  Make::select('id','name')
            ->wherehas('vehicles')
            ->orderby('name')
            ->withCount('vehicles')
            ->get();
        }

    }


    // Modelos

    public function  fill_models_list($model_year=null,$make_id=null,$style_id=null){
        // Solo el axo
        if($model_year && !$make_id && !$style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($model_year){
                        $query->where('model_year',$model_year);
                    })
                    ->withCount('vehicles')
                    ->get();
        }

        // Axo y marca
        if($model_year && $make_id && !$style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($model_year,$make_id){
                        $query->where('model_year',$model_year)
                                ->where('make_id',$make_id);
                    })
                    ->withCount('vehicles')
                    ->get();
        }

        // Axo - Marca - Estilo
        if($model_year && $make_id && $style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($model_year,$make_id,$style_id){
                        $query->where('model_year',$model_year)
                              ->where('make_id',$make_id)
                              ->where('style_id',$style_id);
                    })
                    ->withCount('vehicles')
                    ->get();
        }

        // Solo marca
        if(!$model_year && $make_id && !$style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($make_id){
                        $query->where('make_id',$make_id);
                    })
                    ->withCount('vehicles')
                    ->get();
        }


        // Marca y Estilo
        if(!$model_year && $make_id && $style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($make_id,$style_id){
                        $query->where('make_id',$make_id)
                                ->where('style_id',$style_id);
                    })
                    ->withCount('vehicles')
                    ->get();
        }

        // Solo Estilo
        if(!$model_year && !$make_id && $style_id){
            return  Modell::select('id','name')
                    ->wherehas('vehicles',function($query) use($style_id){
                        $query->where('style_id',$style_id);
                    })
                    ->withCount('vehicles')
                    ->get();
        }

        // Todos

        return Modell::select('id','name')
                                        ->wherehas('vehicles')
                                        ->orderby('name')
                                        ->withCount('vehicles')
                                        ->get();

    }

    // Combo Estilos
    public function  fill_styles_list($model_year=null,$make_id=null,$model_id=null){
            // Solo el axo
            if($model_year && !$make_id && !$model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year){
                            $query->where('model_year',$model_year);
                        })
                        ->withCount('vehicles')
                        ->get();
            }

            // Axo y marca
            if($model_year && $make_id && !$model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year,$make_id){
                            $query->where('model_year',$model_year)
                                    ->where('make_id',$make_id);
                        })
                        ->withCount('vehicles')
                        ->get();
            }

            // Axo - Marca - Modelo
            if($model_year && $make_id && $model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_year,$make_id,$model_id){
                            $query->where('model_year',$model_year)
                                ->where('make_id',$make_id)
                                ->where('model_id',$model_id);
                        })
                        ->withCount('vehicles')
                        ->get();
            }

            // Solo marca
            if(!$model_year && $make_id && !$model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($make_id){
                            $query->where('make_id',$make_id);
                        })
                        ->withCount('vehicles')
                        ->get();
            }


            // Marca y Modelo
            if(!$model_year && $make_id && $model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($make_id,$model_id){
                            $query->where('make_id',$make_id)
                                    ->where('model_id',$model_id);
                        })
                        ->withCount('vehicles')
                        ->get();
            }

            // Solo Modelo
            if(!$model_year && !$make_id && $model_id){
                return  Style::select('id','name')
                        ->wherehas('vehicles',function($query) use($model_id){
                            $query->where('model_id',$model_id);
                        })
                        ->withCount('vehicles')
                        ->get();
            }

            // Todos
            return Style::orderby('name')
                            ->wherehas('vehicles')
                            ->orderby('name')
                            ->withCount('vehicles')
                            ->get();

    }

    // Envia el Filtros a Listener
    public function sendFiltersList(){
        $this->fill_combos_fields();
        $this->emit('readFiltersList',$this->model_year,$this->make_id,$this->model_id,$this->style_id);
        $this->emit('redirect_to_search');

    }

}
