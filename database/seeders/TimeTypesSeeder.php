<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO time_types (english, short_english, spanish, short_spanish) VALUES
        ('Full Time','FulTim','Tiempo Completo','TieCom'),
        ('Half Time','HalTim','Medio Tiempo','MedTie'),
        ('On Time','OnTi','Por Tiempo','PorTie'),
        ('Temporary','Tempo','Temporal','Temp'),
        ('Occasional','Occas','Eventual','Even')";

        DB::update ($sql);
    }
}
