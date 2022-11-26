<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use App\Models\Job;
use App\Models\Position;
use App\Models\SalaryType;
use App\Models\TimesHire;
use App\Models\TimeType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Jobs extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;

    protected $listeners = ['destroy'];

    // Listas de valores
    public $positions   = null;
    public $salary_types= null;
    public $time_types  = null;
    public $time_hires  = null;

    // De la tabla
    public $mandatory_experience;
    public $remote;
    public $show_address;
    public $applicants_send_cv;
    public $notify_daily_applications;
    public $notify_each_application;
    public $mandatory_english;
    public $complies_legal_requirements;
    public $active;

    protected $rules = [
        'main_record.company_id'                    =>'required|exists:companies',
        'main_record.name'                          =>'required|min:5',
        'main_record.position_id'                   =>'required|exists:positions',
        'main_record.salary_type_id'                =>'required|exists:salary_types',
        'main_record.time_type_id'                  =>'required|exists:time_types',
        'main_record.show_salary_by'                =>'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$',
        'main_record.min_salary'                    =>'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$',
        'main_record.max_salary'                    =>'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$',
        'main_record.amount_salary'                 =>'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$',
        'main_record.salary_periodicity'            =>'nullable|In:hour,day,week,month,year',
        'main_record.address'                       =>'nullable',
        'main_record.zipcode'                       =>'nullable|exists:zipcodes',
        'main_record.longitude'                     =>'nullable',
        'main_record.latitude'                      =>'nullable',
        'main_record.shift'                         =>'nullable|In:morning,evening,night,mixed',
        'main_record.complete_address'              =>'nullable',
        'main_record.years_experience'              =>'nullable|numeric',
        'main_record.mandatory_experience'          =>'nullable',
        'main_record.times_hire_id'                 =>'nullable|exists:times_to_hire',
        'main_record.quantity_jobs'                 =>'nullable|numeric|min:0',
        'main_record.remote'                        =>'nullable',
        'main_record.show_address'                  =>'nullable',
        'main_record.applicants_send_cv'            =>'nullable',
        'main_record.notify_daily_applications'     =>'nullable',
        'main_record.notify_each_application'       =>'nullable',
        'main_record.mandatory_english'             =>'nullable',
        'main_record.complies_legal_requirements'   =>'nullable',
        'main_record.active'                        =>'nullable',
        'main_record.description'                   =>'nullable',
        'main_record.benefits'                      =>'nullable',
        'main_record.covid_precautions'             =>'nullable',
        'main_record.created_by_id'                 =>'required|exists:users',
        'main_record.posted_on'                     =>'nullable',
        'main_record.image'                         =>'nullable',
    ];


    public function mount()
    {
        $this->authorize('hasaccess', 'jobs.index');
        $this->manage_title = __('Manage') . ' ' . __('Jobs');
        $this->search_label = __('Job');
        $this->view_form = 'livewire.jobs.form';
        $this->view_table = 'livewire.jobs.table';
        $this->view_list = 'livewire.jobs.list';
        $this->main_record = new Job();
        $this->fill_combos();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Job')
                                                            : __('Create') . ' ' . __('Job');
        $this->create();
        return view('livewire.index', [
            'records' => Job::Name($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->main_record = new Job();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->main_record->mandatory_experience        = $this->mandatory_experience? 1 : 0;
        $this->main_record->remote                      = $this->remote? 1 : 0;
        $this->main_record->show_address                = $this->show_address? 1 : 0;
        $this->main_record->applicants_send_cv          = $this->applicants_send_cv? 1 : 0;
        $this->main_record->notify_daily_applications   = $this->notify_daily_applications? 1 : 0;
        $this->main_record->notify_each_application     = $this->notify_each_application? 1 : 0;
        $this->main_record->mandatory_english           = $this->mandatory_english? 1 : 0;
        $this->main_record->complies_legal_requirements = $this->complies_legal_requirements? 1 : 0;
        $this->main_record->active                      = $this->active? 1 : 0;

        foreach(Auth::user()->companies as $company){
            $this->main_record->company_id = $company->id;
            break;
        }
        $this->main_record->created_by_id = Auth::user()->id;

        $this->validate();
        $this->main_record->save();

        if($this->file_path){
            $this->validate([
                'file_path'    => 'image|max:2048',
            ]);

            $image_path = $this->store_main_record_file($this->file_path,'jobs',true);
            $this->main_record->file_path = $image_path;
        }

        $this->close_store('Job');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Job $record)
    {
        $this->main_record                  = $record;
        $this->record_id                    = $record->id;
        $this->mandatory_experience         = $record->mandatory_experience;
        $this->remote                       = $record->remote;
        $this->show_address                 = $record->show_address;
        $this->applicants_send_cv           = $record->applicants_send_cv;
        $this->notify_daily_applications    = $record->notify_daily_applications;
        $this->notify_each_application      = $record->notify_each_application;
        $this->mandatory_english            = $record->mandatory_english;
        $this->complies_legal_requirements  = $record->complies_legal_requirements;
        $this->active                       = $record->active;
        $this->create_button_label          = __('Update') . ' ' . __('Job');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Job $record)
    {
        $this->delete_record($record, __('Job') . ' ' . __('Deleted') . ' ' . __('Successfully!!'));
    }

    // Llena Combos

    public function fill_combos()
    {
        $this->positions    = Position::all();
        $this->salary_types = SalaryType::all();
        $this->time_types   = TimeType::all();
        $this->time_hires   = TimesHire::all();
    }

}
