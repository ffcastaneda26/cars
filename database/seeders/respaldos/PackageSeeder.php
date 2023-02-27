<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('packages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $sql= "INSERT INTO packages (name,price) VALUES
        ('Basic',99),
        ('Advanced',199),
        ('Premium',499)";

        DB::update ($sql);
    }
}
