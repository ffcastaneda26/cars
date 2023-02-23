<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('styles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Acivamos la revisión de claves foráneas

        $sql= "INSERT INTO styles (name) VALUES
            ('SUV'),
            ('PICK-UP'),
            ('SEDAN')";
        DB::update ($sql);
    }
}
