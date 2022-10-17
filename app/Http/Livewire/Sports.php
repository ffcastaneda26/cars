<?php

namespace App\Http\Livewire;

use App\Models\Sport;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Traits\FilesTrait;
use App\Traits\ZipCodeTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Sports extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithFileUploads;

    use CrudTrait;
    use UserTrait;
    use ZipCodeTrait;
    use FilesTrait;

    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:25',
        'main_record.short_spanish' => 'nullable|min:3|max:8',
        'main_record.english'       => 'required|min:3|max:25',
        'main_record.short_english' => 'required|min:3|max:8',
        'main_record.individual'    => 'nullable',
        'main_record.logotipo'      => 'nullable'
    ];


    public $individual;
    public $file_path;

    public function mount()
    {
        $this->authorize('hasaccess', 'sports.index');
        $this->manage_title = __('Manage') . ' ' . __('Sports');
        $this->search_label = __('Name');
        $this->view_form = 'livewire.sports.form';
        $this->view_table = 'livewire.sports.table';
        $this->view_list = 'livewire.sports.list';
        $this->main_record = new Sport();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {

        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Sport')
                                                            : __('Create') . ' ' . __('Sport');

        return view('livewire.index', [
            'records' => Sport::Name($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->reset('file_path','individual');
        $this->main_record = new Sport();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {

        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:25|unique:sports,spanish,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:sports,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:25|unique:sports,english,{$this->main_record->id}"
                                                                     : 'required|min:3|max:25|unique:sports,english';
        $this->rules['main_record.short_spanish'] = $this->main_record->id ? "required|min:3|max:8|unique:sports,short_spanish,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:sports,short_spanish';
        $this->rules['main_record.short_english'] = $this->main_record->id ? "required|min:3|max:8|unique:sports,short_english,{$this->main_record->id}"
                                                                           : 'required|min:3|max:8|unique:sports,short_english';

        $this->validate();
        $this->main_record->individual = $this->individual ? 1 : 0;

        if($this->file_path){
            $this->validate([
                'file_path'    => 'image|max:2048',
            ]);
            $this->main_record->logotipo = $this->store_main_record_file($this->file_path,'sports',true);
        }

        $this->main_record->save();
        $this->close_store('Sport');

    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Sport $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->individual   = $record->individual;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(Sport $record)
    {
        $this->delete_record($record, __('Sport') . ' ' . __('Deleted Successfully!!'));
    }
}


