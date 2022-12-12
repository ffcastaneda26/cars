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
            'dealer_user',
            'location_user',
            'permission_user',
            'permission_role',
            'role_user',
            'users',
            'roles',
            'permissions',
            'statuses',
            'colors',
            'packages',
            'social_networks',
            'api_tags_attributes',
            'missing_tags',
            'tags',
            'dealers',
            'locations',
        ]);

        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            StatusSeeder::class,
            ColorSeeder::class,
            PackageSeeder::class,
            SocialNetworkSeeder::class,
            ApiTagsAttributeSeeder::class,
            TagSeeder::class,
            DealerSeeder::class,
            LocationSeeder::class,
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
