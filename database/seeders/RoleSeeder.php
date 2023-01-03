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
            ('manager', 'Manager','Gerente Cuenta',0),
            ('dealer', 'Dealer','Distribuidor',0),
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

        // Distribuidor
        $user = User::findOrFail(3);
        $role = Role::where('name','manager')->first();
        $user->roles()->attach($role);

        // Asigna los permisos del Distribuidor

        $role->permissions()->sync($permissions);

        // Soporte
        $user = User::findOrFail(4);
        $role = Role::where('name','support')->first();
        $user->roles()->attach($role);


        // Agente
        $user = User::findOrFail(5);
        $role = Role::where('name','agent')->first();
        $user->roles()->attach($role);

        // General
        $user = User::findOrFail(6);
        $role = Role::where('name','general')->first();
        $user->roles()->attach($role);


    }
}
