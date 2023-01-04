<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('statuses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos

        $sql= "INSERT INTO statuses (spanish,short_spanish,english,short_english) VALUES
                ('Interesado','Intere','Interested','Intere'),
                ('Contactado','Contac','Conctacted','Contac'),
                ('No Inteesado','NotInt','Not Interested','NotInt'),
                ('Vendido','Vendid','Sold','Sold')";

        DB::update ($sql);
    }
}

