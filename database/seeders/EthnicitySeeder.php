<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthnicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "INSERT INTO ethnicities (id, spanish, english) VALUES
        (1, 'Hispano', 'Hispanic'),
        (2, 'Afro Americano', 'African American'),
        (3, 'Blanco', 'White'),
        (4, 'Asiático', 'Asian'),
        (5, 'Otro', 'Other')";

        DB::update ($sql);

    }
}
