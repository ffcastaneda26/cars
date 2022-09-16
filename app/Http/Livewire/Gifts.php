<?php

namespace App\Http\Livewire;

use App\Models\Gift;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Promotion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Gifts extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    public $active;
    public $promotions=null;

    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:gifts,spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:gifts,english',
        'main_record.promotion_id'  => 'required|exists:promotions,id',
        'main_record.active'        => 'nullable'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'Gift.index');
        $this->manage_title = __('Manage') . ' ' . __('Gift');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.gifts.form';
        $this->view_table = 'livewire.gifts.table';
        $this->view_list = 'livewire.gifts.list';
        $this->main_record = new Gift();
        $this->promotions = Promotion::all();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Gift');

        return view('livewire.index', [
            'records' => Gift::Gift($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Gift();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:gifts,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:gifts,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:gifts,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:gifts,english';

        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;
        $this->main_record->save();

        $this->close_store('Gift');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Gift $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Gift');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Gift $record)
    {
        $this->delete_record($record, __('Gift') . ' ' . __('Deleted Successfully!!'));
    }
}

