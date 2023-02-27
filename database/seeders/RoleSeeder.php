<?php

namespace Database\Seeders;

use App\Models\Permission;
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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas


        $permissions = Permission::all();

        $sql= "INSERT INTO roles (name,english,spanish,full_access) VALUES
            ('admin', 'General Admin','Administrador General',1),
            ('support', 'Support','Soporte',0)";


        DB::update ($sql);
        // Administrador
        $user = User::findOrFail(1);
        $role = Role::where('name','admin')->first();
        $user->roles()->attach($role);


        // Soporte
        $user = User::findOrFail(2);
        $role = Role::where('name','support')->first();
        $user->roles()->attach($role);



    }
}
