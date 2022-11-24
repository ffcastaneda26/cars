<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO positions (english,short_english,spanish,short_spanish) VALUES
        ('Cook ','Cook','Cocinero','Cocinero'),
        ('Chef ','Chef','Chef','Chef'),
        ('Waiter','Waiter','Mesero(a)','Mesero'),
        ('Cashier','Cashier','Cajero(a)','Cajero'),
        ('Assistant ','Assisten','Auxiliar','Auxiliar'),
        ('Systems analyst ','SystAnal','Anallista de Sistemas','AnalSist'),
        ('Software Developer','SoftDeve','Desarrollador Software','DesaSoft'),
        ('Front End Developer','FendDeve','Desarrollador Front End','DesaFend')";
        DB::update($sql);
    }
}
