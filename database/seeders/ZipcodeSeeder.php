<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZipcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('zipcodes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Acivamos la revisión de claves foráneas
        $sql= "INSERT INTO zipcodes (zipcode,town,type,state,county,timezone,areacode,latitude,longitude,region,country) VALUES
            (77001,'Houston','City','TX','Houston','UTC',281,29.749907,-95.358421,'ES','US')";
        DB::update ($sql);
    }
}
