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
        $sql= "INSERT INTO time_types (english,short_english,spanish,short_spanish) VALUES
        ('Full Time','FullTime','Tiempo Completo','TiemComp'),
        ('Half Time','HalfTime','Medio Tiempo','MediTiem'),
        ('On Time','OnTime','Por Tiempo','PorTiem'),
        ('Temporary','Tempor','Temporal','Temporal'),
        ('Occasional','Occasio','Eventual','Eventual')";

        DB::update ($sql);
    }
}
