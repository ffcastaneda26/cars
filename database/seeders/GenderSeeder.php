<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "INSERT INTO genders (spanish, english) VALUES
        ('Masculino', 'Male'),
        ('Femenino', 'Female'),
        ('Transgénero', 'Transgender'),
        ('No-binario', 'Non-binary'),
        ('Prefiero no responder','Prefer not to answer'),
        ('Otro', 'Other')";

        DB::update ($sql);
    }
}
