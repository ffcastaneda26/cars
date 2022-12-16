<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Drivetrain;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DriveTrains extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.spanish'       => 'required|min:5|max:25|unique:drivetrains,spanish',
        'main_record.english'       => 'required|min:5|max:25|unique:drivetrains,english',
    ];

    public function mount()
    {
        $this->authorize('hasaccess', 'drivetrains.index');
        $this->manage_title = __('Manage') . ' ' . __('Drivetrains');
        $this->search_label = __('Drivetrain');
        $this->view_form    = 'livewire.drivetrains.form';
        $this->view_table   = 'livewire.drivetrains.table';
        $this->view_list    = 'livewire.drivetrains.list';
        $this->main_record  = new Drivetrain();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Drivetrain')
                                                            : __('Create') . ' ' . __('Drivetrain');

        $records = Drivetrain::Complete($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Drivetrain();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.spanish'] = $this->main_record->id ? "required|min:5|max:25|unique:drivetrains,spanish,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:drivetrains,spanish';
        $this->rules['main_record.english'] = $this->main_record->id ? "required|min:5|max:25|unique:drivetrains,english,{$this->main_record->id}"
                                                                     : 'required|min:5|max:25|unique:drivetrains,english';

        $this->validate();
        $this->close_store('Drivetrain');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Drivetrain $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->create_button_label = __('Update') . ' ' . __('Drivetrain');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Drivetrain $record)
    {
        $this->delete_record($record, __('Drivetrain') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}
