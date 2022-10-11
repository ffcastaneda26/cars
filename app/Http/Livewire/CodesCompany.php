<?php

namespace App\Http\Livewire;

use App\Models\ProcessCodeCompany;
use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Code;
use App\Models\Company;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CodesCompany extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    protected $rules = [
        'main_record.company_id'    => 'required|exists:companies,id',
        'main_record.user_id'       => 'nullable',
        'main_record.total_codes'   => 'required|min:0|max:9999',
        'main_record.printed'       => 'nullable',
    ];

    public $companies   = null;
    public $printed     = false;

    public function mount()
    {
        $this->authorize('hasaccess', 'codes.index');
        $this->manage_title = __('Manage') . ' ' . __('Create Codes');
        $this->view_search  = null;
        $this->view_form    = 'livewire.companies.codes.form';
        $this->view_table   = 'livewire.companies.codes.table';
        $this->view_list    = 'livewire.companies.codes.list';
        $this->main_record  = new ProcessCodeCompany();
        $this->fill_combos();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Codes Company')
        : __('Create') . ' ' . __('Codes Company');


        return view('livewire.index', [
            'records' => ProcessCodeCompany::orderby('company_id')->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new ProcessCodeCompany();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate();
        $this->main_record->printed = $this->printed ? 1 : 0;
        $this->main_record->user_id = Auth::user()->id;
        $this->main_record->save();
        if(!$this->main_record->codes->count()){
            $this->create_codes();
        }

        $this->close_store('Code Process');
    }

    /** Crea el detalle de códigos */
    private function create_codes(){
        for($i=1;$i<=$this->main_record->total_codes;$i++){
            $code_random = $this->main_record->company->code . chr(rand(ord('A'), ord('Z'))) . str_pad(rand(1,9999),4,"0",STR_PAD_LEFT);
            $record_code = null;
            do {
                $code_random = $this->main_record->company->code . chr(rand(ord('A'), ord('Z'))) . str_pad(rand(1,9999),4,"0",STR_PAD_LEFT);
                $record_code = Code::Code($code_random);
            } while (is_null($record_code));
            Code::create([
                'process_code_company_id'   => $this->main_record->id,
                'code'                      => $code_random
            ]);
        }
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(ProcessCodeCompany $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->printed      = $record->printed;
        $this->openModal();
    }

    /*+------------------------------+
      | Elimina Registro             |
      +------------------------------+
    */
    public function destroy(ProcessCodeCompany $record)
    {
        $this->delete_record($record, __('Code Process') . ' ' . __('Deleted Successfully!!'));
    }

    /*+---------------------+
      | Llena Combos        |
      +---------------------+
    */
    public function fill_combos(){
        $this->companies = Company::orderby('name')->get();
    }

    /*+---------------------+
      | Exportar Códigos    |
      +---------------------+
    */

    public function export_codes(ProcessCodeCompany $record)
    {
        dd($record->codes);
    }

}
