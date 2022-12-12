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
			'first_name'        => 'Administrador',
            'last_name'         => 'General',
			'email'             => 'admin@admin.com',
            'phone'             => '1111111111',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
            'first_name'        => 'Manager',
            'last_name'         => 'General',
			'email'             => 'manager@cuervo.com',
            'phone'             => '2222222222',
            'email_verified_at' => now(),
            'active'            => 1,
            'password'          => Hash::make('password')
        ]);

        User::create([
            'first_name'        => 'Distribuidor',
            'last_name'         => 'General',
			'email'             => 'dealer@cuervo.com',
            'phone'             => '3333333333',
            'email_verified_at' => now(),
            'active'            => 1,
            'password'          => Hash::make('password')
        ]);

        User::create([
            'first_name'        => 'Usuario',
            'last_name'         => 'Soporte',
			'email'             => 'support@cuervo.com',
            'phone'             => '4444444444',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
            'first_name'         => 'Distribuidor',
            'last_name'         => 'General',
			'email'             => 'agent@cuervo.com',
            'phone'             => '5555555555',
            'email_verified_at' => now(),
            'active'            => 1,
            'password'          => Hash::make('password')
        ]);

        User::create([
            'first_name'        => 'Usuario',
            'last_name'         => 'General',
			'email'             => 'general@cuervo.com',
            'phone'             => '6666666666',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

    }
}
