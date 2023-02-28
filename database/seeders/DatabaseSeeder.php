<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'permission_user',
            'permission_role',
            'role_user',
            'users',
            'roles',
            'permissions',
            'makes',
            'models',
            'styles',
            'zipcodes',
            'dealers',
            'vehicles'
        ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            MakeSeeder::class,
            ModelSeeder::class,
            StyleSeeder::class,
            ZipcodeSeeder::class,
            DealerSeeder::class,
            VehicleSeeder::class,
        ]);

    }

    // Limpia las tablas
    protected function truncateTables(array $tables) {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Desactivamos la revisión de claves foráneas
    }
}
