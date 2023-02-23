<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('makes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Acivamos la revisión de claves foráneas

        $sql= "INSERT INTO makes (name) VALUES
            ('ACURA'),
            ('BUICK'),
            ('CADILLAC'),
            ('CHEVROLET'),
            ('CHRYSLER'),
            ('DODGE'),
            ('FORD'),
            ('GENESIS'),
            ('GMC'),
            ('HONDA'),
            ('HYUNDAI'),
            ('INFINITI'),
            ('JEEP'),
            ('KIA'),
            ('LEXUS'),
            ('LINCOLN'),
            ('MAZDA'),
            ('MITSUBISHI'),
            ('NISSAN'),
            ('RAM'),
            ('TOYOTA'),
            ('VOLKSWAGEN'),
            ('YAMAHA')";
        DB::update ($sql);
    }

}
