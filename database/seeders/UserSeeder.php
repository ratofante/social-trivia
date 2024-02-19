<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'admin1234',
        ])->assignRole('admin');

        User::create([
            'name' => 'cumbia',
            'email' => 'cumbia@gmail.com',
            'email_verified_at' => now(),
            'password' => 'cumbia1234',
        ])->assignRole('novice');

        User::create([
            'name' => 'sumo',
            'email' => 'sumo@gmail.com',
            'email_verified_at' => now(),
            'password' => 'sumo1234',
        ])->assignRole('apprentice');

        User::create([
            'name' => 'sumerio',
            'email' => 'sumerio@gmail.com',
            'email_verified_at' => now(),
            'password' => 'sumerio1234'
        ])->assignRole('adept');
    }
}
