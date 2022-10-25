<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name' => 'Administrador General',
			'email' => 'admin@admin.com',
            'nickname' => 'admin',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Manager General',
			'email' => 'manager@jale.com',
            'nickname' => 'manager',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);


    }
}
