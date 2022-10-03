<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';

    protected $fillable = ['name', 'file_path', 'fileable_id', 'fileable_type'];

    public function fileable() {
        return $this->morphTo();
    }

        /*+---------------------------------+
        | Búsquedas x diferentes Criterios |
        +----------------------------------+
        */

    public function scopeName($query,$value)
    {
        if ( trim($value) != "") {
            $query->where('name','LIKE',"%$value%");
        }
    }

    // De una cuenta
    public function scopeAccountId($query, $valor)
    {
        if (trim($valor) != '') {
            $query->where('account_id', '=', $valor);
        }
    }

    // De un proyecto
    public function scopeProjectId($query, $valor)
    {
        if (trim($valor) != '') {
            $query->where('project_id', '=', $valor);
        }
    }

    public function can_be_delete(){
        return true;
    }
}
