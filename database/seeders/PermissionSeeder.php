<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sql= "INSERT INTO permissions (name,slug,english,spanish) VALUES
        ('users','users.index','Users','Usuarios'),
        ('vehicles','vehicles.index','Vehicles','Vehículos')";

        DB::update ($sql);

    }
}
