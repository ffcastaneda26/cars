<?php

namespace App\Http\Livewire;

use App\Models\Code;
use App\Models\Game;
use Livewire\Component;
use App\Models\Competidor;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Pick;
use Illuminate\Support\Facades\Redirect;

class RegisterCompetidors extends Component
{
    use CrudTrait;

    protected $listeners = ['validate_picks'];


    public $request_competidor_code  = true;
    public $request_competidor_data  = false;
    public $request_competidor_picks = false;
    public $confirm_register_competidor=false;
    public $code            = null;
    public $error_message    = null;
    public $code_record;

    public $first_name, $last_name, $email, $phone;
    public $agree_be_legal_age;

    // PronósticoS (Picks)
    public $games       = null;
    public $local_scores= [];
    public $visit_scores= [];
    public $winners     = [];


    // Valores iniciales
    public function mount(){
        $this->request_competidor_code = true;
        $this->games = Game::orderby('date')->get();

    }

    // TODO: ¿Cómo va a ver los aciertos el participante?
    public function render()
    {
        return view('livewire.competidors.register-competidors');
    }


    // Procesa el código
    public function validate_code(){
        $this->code_record = null;
        $this->request_competidor_data = false;
        $this->error_message = null;
        $this->reset('first_name','last_name','phone','email','agree_be_legal_age');

        $this->resetErrorBag();


        if (strlen($this->code) != 8) return;
            $this->code = strtoupper($this->code);
            $this->code_record = Code::Code($this->code)->first();

        if ($this->code_record) {
            if($this->code_record->isUsed()){
                $this->error_message = __('The code has already been registered');
            }else{
                $this->request_code             = false;
                $this->request_competidor_data  = true;
                $this->request_competidor_picks = false;
            }
        } else {
            $this->error_message = __('Coupon Does Not Exists');
        }
    }

    /** Revisa quetodos los datos del usuario hayan sido introducidos */
    public function validate_competidor_data(){
        $this->validate([
            'first_name'    => 'required|min:3|max:100',
            'last_name'     => 'required|min:3|max:100',
            'phone'         => 'required|digits:10',
            'email'         => 'nullable|email|max:100',
        ]);

        $this->request_code             = false;
        $this->request_competidor_data  = false;
        $this->request_competidor_picks = True;

    }

    /* Valida los pronósticos */
    public function validate_picks(){
        $this->confirm_register_competidor = false;
        $this->error_message = null;
            if($this->games->count() > (count($this->winners) + count($this->local_scores) + count($this->visit_scores ))){
              $this->error_message = __('Type all your picks');
        }else{
            $this->register_competidor();
        }
    }

      /** Inicializa Variables */
    public function resetInputFields()
    {
        $this->reset(['error_message','request_competidor_data','request_competidor_picks','code_record', 'code', ]);
        $this->reset('games','local_scores','visit_scores','winners');

    }

    /*+------------------------------------+
      | Registro del competidor             |
      +-------------------------------------+
      | 1.- Crea el competidor              |
      | 2.- Crea pronósticos                |
      | 3.- Marca código con el competidor  |
      | 4.- Envía a registro de competidor  |
      +-------------------------------------+
    */
    public function register_competidor(){
        DB::beginTransaction();
        try {
            $competidor = $this->create_competidor();

            $this->picks_games_without_score($competidor);

            $this->picks_games_with_score($competidor);
            $this->code_record->competidor_id = $competidor->id;
            $this->code_record->save();

            DB::commit();
          
            $this->resetInputFields();
            $this->request_competidor_code = true;
            $this->request_competidor_data = false;
            $this->request_competidor_picks= false;

            $this->dispatchBrowserEvent('alert',[
                'type'=>    'success',
                'message'=> __('Competidor Created Successfully')
            ]);

            // TODO: Revisar a que ruta se debe enviar
            Redirect::away('/picks/' . $competidor->id);
        
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            DB::rollback();  // something went wrong
        }

    }

    /** Crea Competidor */
    private function create_competidor(){
        return Competidor::create([
            'first_name'=> $this->first_name,
            'last_name' => $this->last_name,
            'email'     => $this->email,
            'phone'     => $this->phone,
        ]);
    }

    /** Pronósticos de partidos que no pide marcador */
    private function picks_games_without_score($competidor){
        foreach ($this->winners as $game => $pronostico){
            $this->create_pick($competidor->id,$game,$pronostico);
        }
    }

    /** Pronosticos de partidos que pide marcador */
    private function picks_games_with_score($competidor){
          foreach ($this->local_scores as $game => $local_score){
            if( $local_score == $this->visit_scores[$game] ){
                $winner = 0;
            }

            if( $local_score > $this->visit_scores[$game] ){
                $winner = 1;
            }

            if( $local_score < $this->visit_scores[$game] ){
                $winner = 2;
            }

            $this->create_pick($competidor->id,$game,$winner,$local_score,$this->visit_scores[$game]);

        }
    }

    private function create_pick($competidor_id,$game_id,$winner,$local_store=0,$visit_score=0){
        Pick::create([
            'competidor_id' => $competidor_id,
            'game_id'       => $game_id,
            'winner'        => $winner,
            'local_score'   => $local_store,
            'visit_score'   => $visit_score
        ]);
    }
}
