<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO industries (english,short_english,spanish,short_spanish) VALUES
            ('Restaurant ','Restaur','Restaurante','Restaura'),
            ('Construction ','Construc','Construcción','Construc'),
            ('Marketing ','Marketin','Mercadotecnia','Mercadot'),
            ('Software ','Software','Software','Software'),
            ('Health ','Health','Salud','Salud'),
            ('Human Resources','HumaReso','Recursos Humanos','RecuHuma')";
        DB::update($sql);
    }
}
