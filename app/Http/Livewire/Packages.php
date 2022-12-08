<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Traits\UserTrait;
use App\Models\Package;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Packages extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use UserTrait;


    protected $listeners = ['destroy'];


    protected $rules = [
        'main_record.name'                              =>'required|min:3|max:100|unique:packages,name',
        'main_record.price'                             =>'required|integer',
        'main_record.max_show_vehicles_per_location'    =>'nullable|integer',
        'main_record.photo_rotation'                    =>'nullable',
        'main_record.phone_number_listing_per_location' =>'nullable|integer',
        'main_record.locations_allowed'                 =>'nullable|integer',
        'main_record.team_cuervo_photo_upload'          =>'nullable',
        'main_record.max_tags_higlights'                =>'nullable|integer',
        'main_record.premium_tag_search'                =>'nullable|integer',
        'main_record.vehicle_listing_bonus'             =>'nullable|integer',
        'main_record.max_photos_by_vehicle'             =>'nullable|integer',
        'main_record.max_photos_by_location'            =>'nullable|integer',
        'main_record.company_web_site_listing'          =>'nullable',
        'main_record.self_service_photo_upload'         =>'nullable',
        'main_record.tag_higlights'                     =>'nullable',
        'main_record.add_to_favorites'                  =>'nullable',
        'main_record.notify_add_to_favorites'           =>'nullable',
        'main_record.access_interested_users'           =>'nullable',
        'main_record.inventory_integratgion'            =>'nullable',
        'main_record.price_additional_location'         =>'nullable',
        'main_record.search_by_tags'                    =>'nullable',
        'main_record.show_prices'                       =>'nullable',
        'main_record.show_locations'                    =>'nullable',
        'main_record.count_clicks_in_vehicle'           =>'nullable',
        'main_record.count_time_see_vehicle'            =>'nullable',
        'main_record.count_photos_see'                  =>'nullable',
        'main_record.use_order_to_search'               =>'nullable',
    ];

    public $company_web_site_listing;
    public $self_service_photo_upload;
    public $tag_higlights;
    public $add_to_favorites;
    public $notify_add_to_favorites;
    public $access_interested_users;
    public $inventory_integratgion;
    public $search_by_tags;
    public $show_prices;
    public $show_locations;
    public $count_clicks_in_vehicle;
    public $count_time_see_vehicle;
    public $count_photos_see;
    public $use_order_to_search;
    public $max_show_vehicles_per_location;


    public function mount()
    {
        $this->authorize('hasaccess', 'package.index');
        $this->manage_title = __('Manage') . ' ' . __('Packages');
        $this->search_label = __('Package');
        $this->view_form    = 'livewire.packages.form';
        $this->view_table   = 'livewire.packages.table';
        $this->view_list    = 'livewire.packages.list';
        $this->view_crud_modal  = 'livewire.packages.modal_form';

        $this->main_record  =  new Package();
        $this->openModal();

    }

    public function render()
    {
        $this->create_button_label = $this->main_record->id ? __('Update') . ' ' . __('Package')
                                                            : __('Create') . ' ' . __('Package');


        $records = Package::Name($this->search)->orderby($this->sort,$this->direction)->paginate(10);
        return view('livewire.index',compact('records'));
    }


    public function resetInputFields()
    {
        $this->main_record = new Package();
        $this->resetErrorBag();
    }

     /*+---------------+
    | Guarda Registro |
    +-----------------+
    */

    public function store()
    {
        $this->rules['main_record.name'] = $this->main_record->id ? "required|min:3|max:100|unique:packages,name,{$this->main_record->id}"
                                                                  : 'required|min:3|max:100|unique:packages,name';


        $this->main_record->company_web_site_listing    = $this->company_web_site_listing? 1 : 0;
        $this->main_record->self_service_photo_upload   = $this->self_service_photo_upload? 1 : 0;
        $this->main_record->tag_higlights               = $this->tag_higlights? 1 : 0;
        $this->main_record->add_to_favorites            = $this->add_to_favorites? 1 : 0;
        $this->main_record->notify_add_to_favorites     = $this->notify_add_to_favorites? 1 : 0;
        $this->main_record->access_interested_users     = $this->access_interested_users? 1 : 0;
        $this->main_record->inventory_integratgion      = $this->inventory_integratgion? 1 : 0;
        $this->main_record->search_by_tags              = $this->search_by_tags? 1 : 0;
        $this->main_record->show_prices                 = $this->show_prices? 1 : 0;
        $this->main_record->show_locations              = $this->show_locations? 1 : 0;
        $this->main_record->count_clicks_in_vehicle     = $this->count_clicks_in_vehicle? 1 : 0;
        $this->main_record->count_time_see_vehicle      = $this->count_time_see_vehicle? 1 : 0;
        $this->main_record->count_photos_see            = $this->count_photos_see? 1 : 0;
        $this->main_record->use_order_to_search         = $this->use_order_to_search? 1 : 0;

        $this->validate();
        $this->close_store('Package');
    }

    /*+------------------------------+
    | Lee Registro Editar o Borar  |
    +------------------------------+
    */

    public function edit(Package $record)
    {
        $this->main_record  = $record;
        $this->record_id    = $record->id;
        $this->company_web_site_listing= $record->company_web_site_listing;
        $this->self_service_photo_upload= $record->self_service_photo_upload;
        $this->tag_higlights= $record->tag_higlights;
        $this->add_to_favorites= $record->add_to_favorites;
        $this->notify_add_to_favorites= $record->notify_add_to_favorites;
        $this->access_interested_users= $record->access_interested_users;
        $this->inventory_integratgion= $record->inventory_integratgion;
        $this->search_by_tags= $record->search_by_tags;
        $this->show_prices= $record->show_prices;
        $this->show_locations= $record->show_locations;
        $this->count_clicks_in_vehicle= $record->count_clicks_in_vehicle;
        $this->count_time_see_vehicle= $record->count_time_see_vehicle;
        $this->count_photos_see= $record->count_photos_see;
        $this->use_order_to_search= $record->use_order_to_search;

        $this->create_button_label = __('Update') . ' ' . __('Package');
        $this->openModal();
    }

    /*+------------------------------+
    | Elimina Registro             |
    +------------------------------+
    */
    public function destroy(Package $record)
    {
        $this->delete_record($record, __('Package') . ' ' . __('Deleted Successfully!!'));
       $this->reset('search');
    }

}


