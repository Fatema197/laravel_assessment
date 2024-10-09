<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'), // Use Hash::make for passwords
        ]);

        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'date_of_birth' => '1992-02-02',
            'gender' => 'female',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
