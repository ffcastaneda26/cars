<?php

namespace App\Http\Livewire;

use App\Models\Code;
use Livewire\Component;
use App\Models\Competidor;
use App\Http\Livewire\Traits\CrudTrait;

class RegisterCompetidors extends Component
{
    use CrudTrait;

    public $message_code  = null;
    public $can_continue = false;
    public $read_competidor_data = null;
    public $read_picks = null;
    public $coupon_code;
    public $coupon_record;
    public $first_name, $last_name, $email, $phone;
    public $agree_be_legal_age;
    public $competidor;

    public function render()
    {
        return view('livewire.register-competidors');
    }


    public function read_coupon(){
        if (strlen($this->coupon_code) != 8) return;
        $this->coupon_code = strtoupper($this->coupon_code);
        $this->coupon_record = Code::Code($this->coupon_code)->first();

        if ($this->coupon_record) {
                $this->can_continue = true;
                $this->message_code = __('Coupon has already');
        } else {
            $this->message_code = __('Coupon Does Not Exists');
        }
    }

      /** Inicializa Variables */
    public function resetInputFields()
    {
        $this->reset(['message_code','can_continue','read_competidor_data','coupon_record', 'coupon_code', ]);
    }

    public function store () {
        $this->validate([
            'first_name'    => 'required|min:3|max:100',
            'last_name'     => 'required|min:3|max:100',
            'phone'         => 'required|digits:10',
            'email'         => 'nullable|email|max:100',
        ]);
        $this->competidor = Competidor::create([
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'phone'         => $this->phone,
            'email'         => $this->email,
        ]);

        $this->coupon_record->user_id = $this->competidor->id;
        $this->coupon_record->save();
        return redirect('picks' .'/'.$this->competidor->id);
    }
}
