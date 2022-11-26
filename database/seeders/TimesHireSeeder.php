<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimesHireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO times_to_hire (english,short_english,spanish,short_spanish) VALUES
        ('1-3 Days','1-3 Days','1-3 Días','1-3 Días'),
        ('4-7 Days','4-7 Days','4-7 Días','4-7 Días'),
        ('1-2 Weeks','1-2 Week','1-2 Semanas','1-2 Sem'),
        ('3-4 Weeks','3-4 Week','3-4 Semanas','3-4 Sem'),
        ('+ 4 Weeks','+4 Week','+4 Semanas','+4 Sem')";

        DB::update ($sql);
    }
}
