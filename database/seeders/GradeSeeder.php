<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO grades (english,short_english,spanish,short_spanish) VALUES
        ('Elementary School ','ElemScho','Primaria','Primaria'),
        ('Middle School ','MidlScho','Secundaria','Secundar'),
        ('High School','HighScho','Preparatoria','Preparat'),
        ('Community College','CommColl','Colegio Comúnn','ColeComu'),
        ('University ','Universi','Universidad','Universi'),
        ('MBA','MBA','Maestría','Maestria'),
        ('Ph D','PhD','Doctorado','Doctorad'),
        ('None','None','Ninguno','Ninguno')";
        DB::update($sql);
    }
}
