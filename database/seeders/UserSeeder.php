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
            'email' => 'gwilkens.r@gmail.com',
            'email_verified_at' => now(),
            'password' => 'Cumbia12',
        ])->assignRole('player');
    }
}
