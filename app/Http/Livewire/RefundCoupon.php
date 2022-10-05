<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\CrudTrait;
use Livewire\Component;
use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RefundCoupon extends Component
{
    use AuthorizesRequests;
    use CrudTrait;

    public $can_refund      = false;
    public $message_coupon  = null;
    public $coupon_code     = null;
    public $coupon_record   = null;

    protected $listeners = ['refund'];


    public function mount()
    {
        $this->authorize('hasaccess', 'refund-copuon.index');
        $this->manage_title = __('Refund') . ' ' . __('Coupon');
        $this->search_label = __('Name');
        $this->search = null;
        $this->view_search = null;
        $this->view_form = 'livewire.coupon-controller';
        $this->allow_create = false;
        $this->main_record = new Customer();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        return view('livewire.coupons.refund-coupon');
    }

    /** Inicializa Variables */
    public function resetVariables()
    {
        $this->reset(['can_refund','message_coupon','coupon_code','coupon_record']);
    }

    /*+-----------------------------------------------------+
      | Se lee cupón y determina si es váido cobrarlo o no  |
      +-----------------------------------------------------+
    */

    public function read_coupon(){

        $this->reset(['can_refund','message_coupon','coupon_record']);

        if(strlen($this->coupon_code) != 6) return;
            $this->coupon_code = strtoupper($this->coupon_code);
            $this->coupon_record = Coupon::Code($this->coupon_code)->first();

            if($this->coupon_record){
                if( $this->coupon_record->used){
                    $this->message_coupon = __('Coupon has already been refunded');
                }else{
                    $this->can_refund = true;
                }
            }else{

                $this->message_coupon = __('Coupon Does Not Exists');
            }
    }

    /*+-----------------------+
      | Actualiza como usado  |
      +----------------------+
    */
    public function refund(Coupon $record)
    {
        $record->mark_as_used();
        $this->resetVariables();

        // Alerta
        $this->dispatchBrowserEvent('alert',[
            'type'=> 'success',
            'message'=> 'Coupon has been refunded'
        ]);

    }
}
