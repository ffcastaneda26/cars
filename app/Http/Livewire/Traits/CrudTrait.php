<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Auth;

trait CrudTrait {


    protected $paginationTheme = 'bootstrap';
    public $go_dashboard = false;
    public $image_path;
    public $updating_record = false;
    public $main_record;
    public $manage_title,$create_button_label,$search_label;
    public $record_id,$record;
	public $search,$searchTerm;
    public $isOpen = false;
    public $isOpen2 = false;
    public $isOpenDelete = 0;
    public $allow_create=true;
    public $allow_navigate = true;
    public $member_expired = false;
    public $message;
    private $pagination = 10; //paginación de tabla
    public $per_page = 10;

    public $member_auth_user;
    public $confirm_delete =false;
    public $action_form;
    public $show_delete_detail = false;
    public $only_linked = false;
    public $show_only_linked = true;

    // Permisos
    public $permission_create;
    public $permission_edit;
    public $permission_delete;
    public $permission_view;


    // Vistas
    public $view_search = 'common.crud_search';
    public $view_form;
    public $view_table;
    public $view_list;

    // Encabezado de lista de registros
    public $show_header_card = false;
    public $header_card;

   	//permite la búsqueda cuando se navega entre el paginado
	public function updatingSearch(): void{
		$this->gotoPage(1);
	}


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function create() {
		$this->resetInputFields();
        $this->resetErrorBag();
		$this->openModal();
	}


	/*+---------------------------------------------+
	  | Habilita variable para presentar Modal      |
      +---------------------------------------------+
	 */
	public function openModal($action='edit',$modal = 1) {
        $this->resetErrorBag();
        if($action == 'edit'){
            $this->confirm_delete = false;
            if($modal == 1){
                $this->isOpen = true;
                $this->open2 = false;
            }else{
                $this->isOpen2 = true;
                $this->isOpen = false;
            }
        }
        if($action == 'delete'){
            $this->confirm_delete = true;
            $this->isOpen = false;
            $this->open2 = false;
        }

	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function closeModal() {
        $this->isOpen = false;
        $this->isOpen2 = false;
        $this->confirm_delete = false;
        $this->go_dashboard = true;
        $this->resetInputFields();
    }



    private function delete_record($record,$message){
        $record->delete();
        $this->show_alert('success',$message);
        $this->closeModal();
    }

    private function store_message($message){

        $action_message = $this->record_id ? __('Updated')  : __('Created');
        $action_message .= ' ' . __('Successfully!!');
        $message.= ' ' . $action_message;
        $this->show_alert('success',$message);
        $this->closeModal();
        $this->resetInputFields();
        $this->open = true;

    }

    // Alerta
    private function show_alert($type,$message){
        $this->dispatchBrowserEvent('alert',[
            'type'=>$type,
            'message'=> $message
        ]);
    }

    //Modal y metodo para confirmar eliminacion
    public function selectId($id, $action) {
		$this->selectId = $id;
		if ($action == 'delete') {
			$this->openModaldelete();
		}
	}

    public function openModaldelete() {
		$this->isOpen = false;
		$this->isOpen2 = false;
		$this->isOpen3 = false;
		$this->confirm_delete = true;
	}

    public function close_store($entity='Record'){
        $this->main_record->save();
        $this->resetInputFields();
        $this->closeModal();
        $this->create_button_label = __('Create') . ' ' . __($entity);
        $this->store_message(__($entity));
        $this->resetErrorBag();
    }

    // Guarda la imagen
    public function store_image($directory_file){

         if(!empty($this->image_path)){ // Traemos una imagen

            if($this->updating_record)
            { // Se está actualizando
                $tmpImg = $this->main_record->image_path;
                if($tmpImg !=null && file_exists('storage/'. $directory_file. '/'.$tmpImg)){
                    unlink('storage/'.$directory_file.'/' .$tmpImg);
                }
            }

            $image_file_name = uniqid() . '.' . $this->image_path->extension(); // Nombre de archivo único
            $this->image_path->storeAs('public/'.$directory_file,$image_file_name);
            $this->main_record->image_path = $image_file_name;
            $this->main_record->save();
        }
    }


    public function delete_image($record,$directory_file)
    {
        $tmpImg = $record->image_path;
        if($tmpImg !=null && file_exists('storage/'.$directory_file.'/' .$tmpImg)){
            unlink('storage/'.$directory_file.'/' .$tmpImg);
        }
    }
}
