<?php
/*+-------------------------------------------------------------------------------------------------+
  | MANEJO DE ARCHIVOS                                                                              |
  +-------------------------------------------------------------------------------------------------|
  | Fecha       | Author  |   Descripción                                                           |
  +-------------+---------+-------------------------------------------------------------------------+
  | 26-ago-22   | FCO     | Creación
  +-------------+---------+-------------------------------------------------------------------------+
 */
namespace App\Traits;

use App\Models\File;

trait FilesTrait {
    public $files = [];

    // Guarda Archivo
    public function store_file($file_path,$directory,$fileable_id,$fileable_type){

        if(empty($file_path)) return false;

        $name   = time() .'_'. $file_path->getClientOriginalName();                              // Nombre único
        $url    = $file_path->storeAs($directory,$name);                      // Guarda físicamente archivo
        return $this->store_polimorphic_file($name,$url,$fileable_id,$fileable_type);   // Guarda relación polimórfica
    }

    // Elimina Archivo
   public function delete_file($file_path,$directory)
   {
        if(!empty($file_path)) return false;
        $tmpImg = $file_path;
        if($tmpImg !=null && file_exists('storage/'.$directory.'/' .$tmpImg)){
            unlink('storage/'.$directory.'/' .$tmpImg);
            return true;
        }else{
            return false;
        }
    }

    // Guarda varios archivos
    public function store_files($files, $directory, $fileable_id, $fileable_type) {

        if(!$files || !count($files)) return false;

        foreach ($files as $key => $file) {
            $name   = time() .'_'. $file->getClientOriginalName();                  // Nombre único
            $files[$key] = $file->store($directory,'public');       // Guarda físicamente archivo
            File::create([
                'name'             => $name,
                'file_path'        => $files[$key],
                'fileable_id'      => $fileable_id,
                'fileable_type'    => $fileable_type
            ]);
            //$this->store_polimorphic_file($name,$file_path,$parent_entity->id,$fileable_type);  // Graba relación polimórfica
        }
    }

    // Graba relación polimórfica
    private function store_polimorphic_file($name,$file_path,$fileable_id,$fileable_type){

        return File::create([
            'name'             => $name,
            'file_path'        => $file_path,
            'fileable_id'      => $fileable_id,
            'fileable_type'    => $fileable_type
        ]);
    }

}
