<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Promotions extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    public $active;

    protected $rules = [
        'main_record.spanish'   => 'required|min:5|max:25|unique:promotions,spanish',
        'main_record.english'   => 'required|min:5|max:25|unique:promotions,english',
        'main_record.begin_at'  => 'nullable',
        'main_record.expire_at' => 'nullable',
        'main_record.active'    => 'nullable'
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'Promotion.index');
        $this->manage_title = __('Manage') . ' ' . __('Promotion');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.promotions.form';
        $this->view_table = 'livewire.promotions.table';
        $this->view_list = 'livewire.promotions.list';
        $this->main_record = new Promotion();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') : __('Create');
        $this->create_button_label .= ' ' .   __('Promotion');

        return view('livewire.index', [
            'records' => Promotion::Promotion($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Promotion();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {

        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:promotions,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:promotions,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:promotions,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:promotions,english';

        $this->validate();
        $this->main_record->active = $this->active ? 1 : 0;
        $this->main_record->save();

        $this->close_store('Promotion');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Promotion $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Promotion');
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Promotion $record)
    {
        $this->delete_record($record, __('Promotion') . ' ' . __('Deleted Successfully!!'));
    }
}
