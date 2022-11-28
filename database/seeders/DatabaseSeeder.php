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
            'users',
            'role_user',
            'permission_user',
            'roles',
            'permissions',
            'genders',
            'statuses',
            'nationalities',
            'salary_types',
            'industries',
            'positions',
            'grades',
        ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            GenderSeeder::class,
            StatusSeeder::class,
            NationalitySeeder::class,
            SalaryTypeSeeder::class,
            TimeTypesSeeder::class,
            IndustrySeeder::class,
            PositionSeeder::class,
            GradeSeeder::class,
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
