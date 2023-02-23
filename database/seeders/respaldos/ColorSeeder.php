<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('colors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas


      $sql= "INSERT INTO colors (english,spanish) VALUES
                ('Black','Negro'),
                ('Blue','Azul'),
                ('Brown','Marrón'),
                ('Gold','Oro'),
                ('Gray','Gris'),
                ('Green','Verde'),
                ('Purple','Violeta'),
                ('Red','Rojo'),
                ('Silver','Plata'),
                ('Sand','arena'),
                ('White','Blanco'),
                ('Orange','Naranja'),
                ('Yellow','Amarillo')";


        DB::update ($sql);

    }
}
