<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $sql= "INSERT INTO salary_types (english,short_english,spanish,short_spanish) VALUES
        ('Hour','Hour','Hora','Hora'),
        ('Daily','Daily','Diario','Diario'),
        ('Weekly','Weekly','Semanal','Semanal'),
        ('Monthly','Monthly','Mensual','Mensual'),
        ('Yearly','Yearly','Anual','Anual')";

        DB::update ($sql);
    }
}
