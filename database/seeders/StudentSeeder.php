<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('students')->insert([
            'student_id' => 'ABC202601',
            'name' => 'Manik Patra',
            'email' => 'manik@gmail.com',
            'password' => Hash::make('Manik@123#'), // important: hash password
            'otp' => null,
            'otp_expires_at' => null,
            'is_verified' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
