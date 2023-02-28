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
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);


        User::create([
            'first_name'        => 'Usuario',
            'last_name'         => 'Soporte',
			'email'             => 'support@cuervo.com',
            'email_verified_at' => now(),
            'active' => 1,
            'password' => Hash::make('password')
        ]);


    }
}
