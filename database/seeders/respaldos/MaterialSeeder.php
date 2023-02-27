<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('materials')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas

      $sql= "INSERT INTO materials (english,spanish) VALUES
                ('Polyester','Poliester'),
                ('Leather','Piel'),
                ('Leatherette Vinyl','Piel con Vinil'),
                ('Nylon','Nylon'),
                ('Alcantra','Alcantra')";


        DB::update ($sql);
    }
}

