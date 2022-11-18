<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Language;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Languages extends Component {
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;
    use WithFileUploads;


    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.spanish'       => 'required|min:3|max:20|unique:languages,spanish',
        'main_record.english'       => 'required|min:3|max:20|unique:languages,english',
        'main_record.code'          => 'required|min:2|max:2|unique:languages,code',
        'main_record.image_path'    => 'nullable',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'language.index');
        $this->manage_title = __('Manage') . ' ' . __('Language');
        $this->search_label = __('Name');
        $this->view_form    = 'livewire.languages.form';
        $this->view_table   = 'livewire.languages.table';
        $this->view_list    = 'livewire.languages.list';

        $this->main_record = new Language();
    }


    /*+---------------------------------+
	  | Regresa Vista con Resultados    |
	  +---------------------------------+
	 */

	public function render() {
        $this->create_button_label =  $this->main_record->id ? __('Update') . ' ' . __('Language')
                                                             : __('Create') . ' ' . __('Language');

        return view('livewire.index', [
            'records' => Language::Name($this->search)->paginate($this->pagination),
        ]);
	}


    public function resetInputFields (){
        $this->main_record = new Language();
        $this->resetValidation();
        $this->resetErrorBag();
    }


    /*+-----------------+
      | Guarda Registro |
      +-----------------+
    */

	public function store() {

        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:3|max:20|unique:languages,spanish,{$this->main_record->id}"
                                                        : "required|min:3|max:20|unique:languages,spanish";

        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:3|max:50|unique:languages,english,{$this->main_record->id}"
                                                        : "required|min:3|max:20|unique:languages,english";

        $this->rules['main_record.code'] = $this->main_record->id ? "required|size:2|unique:languages,code,{$this->main_record->id}"
                                                        : "required|size:2|unique:languages,code";

        $this->validate();
        $this->main_record->save();
        $this->store_image('languages');

        $this->resetInputFields();
        $this->closeModal();
	}

    /*+------------------------------+
	  | Lee Registro Editar o Borar  |
	  +------------------------------+
	 */

	public function edit(Language $record) {
        $this->main_record = $record;
        $this->create_button_label = __('Update') . ' ' . __('Language');
        $this->updating_record = true;
		$this->openModal();
	}

    /*+------------------------------+
	  | Elimina Registro             |
	  +------------------------------+
	 */
	public function destroy(Language $record) {
        $this->delete_image($record,'languages');
        $this->delete_record($record,__('Language') . ' ' . __('Deleted Successfully!!'));
    }
}


