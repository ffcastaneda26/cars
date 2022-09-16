<?php

namespace App\Traits;

use App\Models\Zipcode;

trait ZipCodeTrait
{
    public $zipcode=null;
    public $town_state = null;
    public $zipcode_exists = false;


    // Lee zona postal con variable publica
    public function read_town_state($zipcode=null) {
        $this->town_state =Null;
        $this->zipcode_exists = false;
        
        if(!$zipcode && $this->zipcode){
            $zipcode= $this->zipcode;
        }

        if ($this->zipcode) {
            $zipcode_record = $this->read_this_zipcode($zipcode);
            if ($zipcode_record) {
                $this->town_state = $zipcode_record->town . ',' . $zipcode_record->state;
                $this->zipcode_exists = true;
            } else {
                $this->town_state = __('Zipcode does not Exists');
            }
        }

    }

    // Lee zona postal que indiquen
    public function read_this_zipcode($zipcode){
        return Zipcode::Zipcode($zipcode)->first();
    }

}
