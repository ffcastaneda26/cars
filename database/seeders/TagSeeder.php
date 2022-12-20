<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO tags (spanish,english) VALUES
                ('Sin Licencia','No License'),
                ('Sin Revisar Crédito','No Credit Check'),
                ('Financiamiento Interno','In-House Finance'),
                ('Sin ITIN','No ITIN'),
                ('Pasaporte Aceptado','Passport Accepted')";

        DB::update ($sql);

    }
}
