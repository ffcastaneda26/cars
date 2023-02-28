<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('vehicles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Acivamos la revisión de claves foráneas

        $sql= "INSERT INTO vehicles (dealer_id,make_id,model_id,style_id,model_year,price,description,stock) VALUES
        (4,1,1,2,2020,75000.0,'NOTAS DEL VEHICULO','001-6033'),
        (4,1,2,3,2021,15000.0,'Este esta mas bonito','002-7526'),
        (2,2,3,1,2019,7899.0,'Veamos si es el que busca','003-4592')";
        DB::update ($sql);

    }
}
