<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\JobType;
use App\Models\Zipcode;
use Livewire\Component;
use App\Models\Position;
use App\Models\TimesHire;
use App\Traits\UserTrait;
use App\Models\SalaryType;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
    public $job_types  = null;
    public $time_hires  = null;
    public $company_id;
    public $town_state;
    //Campos para el multi-steps
    public $currentStep = 1;
    public $status = 1;
    public $successMessage = '';
    public $open_wizard = false;
    //Steps 1
    public $name;
    public $position_id;
    public $job_type_id;
    public $salary_type_id;
    public $remote;

    //Steps 2
    public $show_salary_by;
    public $min_salary;
    public $max_salary;
    public $amount_salary;
    public $salary_periodicity;
    public $shift;

    //Steps 3
    public $zipcode;
    public $address;
    public $years_experience;
    public $mandatory_experience;
    public $times_hire_id;
    public $quantity_jobs;
    public $show_address;
    public $applicants_send_cv;

    // Steps 4
    public $description;
    public $benefits;
    public $covid_precautions;
    public $posted_on;
    public $notify_daily_applications;
    public $notify_each_application;
    public $mandatory_english;
    public $complies_legal_requirements;
    public $active;
    public $message;

    public function mount()
    {
        //$this->authorize('hasaccess', 'jobs.index');
        $this->manage_title = __('Manage') . ' ' . __('Jobs');
        $this->search_label = __('Job');
        $this->view_form = 'livewire.jobs.form_wizard';
        $this->view_table = 'livewire.jobs.table';
        $this->view_list = 'livewire.jobs.list';
        $this->record_id = new Job();
        $this->fill_combos();
    }

    /*+---------------------------------+
      | Regresa Vista con Resultados    |
      +---------------------------------+
    */

    public function render()
    {
        $this->create_button_label = __('Create') . ' ' . __('Job');
        // $this->create();
        return view('livewire.jobs.index', [
            'records' => Job::Name($this->search)->paginate($this->pagination),
        ]);
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->validate([
            'description'       =>'nullable',
            'benefits'          =>'nullable',
            'covid_precautions' =>'nullable',
            'posted_on'         =>'nullable|date',
            'active'            =>'nullable',
        ]);

        foreach(Auth::user()->companies as $company){
            $this->company_id = $company->id;
            break;
        }

            Job::Create([
            'company_id'                    => $this->company_id,
            'created_by_id'                 => Auth::user()->id,
            'name'                          => $this->name,
            'position_id'                   => $this->position_id,
            'job_type_id'                   => $this->job_type_id,
            'salary_type_id'                => $this->salary_type_id,
            'show_salary_by'                => $this->show_salary_by,
            'min_salary'                    => $this->min_salary,
            'max_salary'                    => $this->max_salary,
            'amount_salary'                 => $this->amount_salary,
            'salary_periodicity'            => $this->salary_periodicity,
            'shift'                         => $this->shift,
            'zipcode'                       => $this->zipcode,
            'address'                       => $this->address,
            'years_experience'              => $this->years_experience,
            'times_hire_id'                 => $this->times_hire_id,
            'quantity_jobs'                 => $this->quantity_jobs,
            'description'                   => $this->description,
            'benefits'                      => $this->benefits,
            'covid_precautions'             => $this->covid_precautions,
            'posted_on'                     => $this->posted_on,
            'remote'                        => $this->remote   ? 1 : 0,
            'show_address'                  => $this->show_address ? 1 : 0,
            'mandatory_experience'          => $this->mandatory_experience ? 1 : 0,
            'applicants_send_cv'            => $this->applicants_send_cv   ? 1 : 0,
            'notify_daily_applications'     => $this->notify_daily_applications ? 1 : 0,
            'notify_each_application'       => $this->notify_each_application  ? 1 : 0,
            'mandatory_english'             => $this->mandatory_english    ? 1 : 0,
            'complies_legal_requirements'   => $this->complies_legal_requirements  ? 1 : 0,
            'active'                        => $this->active   ? 1 : 0,
        ]);
        $this->resetInputFields();
        return redirect('manager/my-jobs');
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
        $this->job_types   = JobType::all();
        $this->time_hires   = TimesHire::all();
    }


    // Primer paso del Wizard
    public function firstStepSubmit()
    {
        $this->validate([
            'name'              =>'required|min:5',
            'position_id'       =>'required|exists:positions,id',
            'job_type_id'       =>'required|exists:job_types,id',
            'salary_type_id'    =>'required|exists:salary_types,id',
            'remote'            =>'nullable',
        ]);

        $this->currentStep = 2;
    }

    //Segundo paso del Wizard
    public function secondStepSubmit()
    {
        $this->validate([
            'show_salary_by'    => 'nullable|In:range,initial,maximum,exactly',
            'min_salary'        => 'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$/',
            'max_salary'        => 'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$/',
            'amount_salary'     => 'nullable|regex:/^(\d{1}\.)?(\d+\.?)+(,\d{2})?$/',
            'salary_periodicity'=> 'nullable|In:hour,day,week,month,year',
            'shift'             => 'nullable|In:morning,evening,night,mixed',
        ]);

        $this->currentStep = 3;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function thirdStepSubmit()
    {
        $this->validate([
            'zipcode'               =>'nullable|exists:zipcodes',
            'address'               =>'nullable',
            'years_experience'      =>'nullable|numeric',
            'mandatory_experience'  =>'nullable',
            'times_hire_id'         =>'required|exists:times_to_hire,id',
            'quantity_jobs'         =>'nullable|numeric|min:0',
            'show_address'          =>'nullable',
            'applicants_send_cv'    =>'nullable',
        ]);
        $this->currentStep = 4;
    }


     // Lee zona postal con variable publica
    public function read_zipcode() {
        $this->town_state ='';
        if ($this->zipcode) {
            $zipcode = Zipcode::where('zipcode','=',$this->zipcode)->first();
            if ($zipcode) {
                $this->town_state = $zipcode->town . ',' . $zipcode->state;
            } else {
                $this->zipcode = 0;
                $this->town_state = __('Zipcode does not Exists');
            }
        } else {
            $this->zipcode = 0;
            $this->town_state = __('Zipcode does not Exists');
        }
    }
}
