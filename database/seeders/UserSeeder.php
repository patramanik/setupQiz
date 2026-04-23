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
     */
      public function run(): void
    {
        User::create([
            'name' => 'Kaushik',
            'email' => 'kaushik@gmail.com',
            'password' => Hash::make('Kaushik@2001#'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@123#'),
        ]);
    }
}
