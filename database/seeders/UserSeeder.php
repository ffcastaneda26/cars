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
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Manager General',
			'email' => 'manager@cuervo.com',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Usuario Soporte',
			'email' => 'support@cuervo.com',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Agente Distribuidor',
			'email' => 'agent@cuervo.com',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);

        User::create([
			'name' => 'Usuario General',
			'email' => 'general@cuervo.com',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);
        
    }
}
