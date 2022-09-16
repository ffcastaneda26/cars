<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO languages (spanish,english,code) VALUES
        ('Español','Spanish','es'),
        ('Inglés','English','en')";

        DB::update ($sql);
    }
}
