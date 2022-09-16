<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sql = "INSERT INTO 'type_questions' (id, spanish, english) VALUES
        (1, 'Falso/Verdadero', 'True/False'),
        (2, 'Opción Múltiple', ' Multiple Choice'),
        (3, 'Abierta', 'Open'),
        (4, 'Escala', 'Scale')";
        DB::update ($sql);


    }
}
