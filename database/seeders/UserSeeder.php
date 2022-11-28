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
            'phone' =>"1234567890",
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Manager General',
			'email' => 'manager@jale.com',
            'nickname' => 'manager',
            'phone' =>"0123456789",
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);


    }
}
