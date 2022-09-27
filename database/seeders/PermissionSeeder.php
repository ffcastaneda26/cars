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
        ('user_edit','user.edit','Edit a User','Editar Usuario'),
        ('user_create','user.create', 'Create a User','Crear Usuario')";

        DB::update ($sql);

    }
}
