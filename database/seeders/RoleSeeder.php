<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql= "INSERT INTO roles (name,english,spanish,full_access) VALUES
                ('admin', 'General Admin','Administrador General',1),
                ('manager', 'Manager','Gerente Cuenta',0),
                ('support', 'Support','Soporte',0),
                ('agent', 'Agent', 'Agente', 0)";

        DB::update ($sql);
        // Administrador
        $user = User::findOrFail(1);
        $role = Role::where('name','admin')->first();
        $user->roles()->attach($role);

        // Manager
        $user = User::findOrFail(2);
        $role = Role::where('name','manager')->first();
        $user->roles()->attach($role);

    }
}
