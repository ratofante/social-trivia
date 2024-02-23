<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        $this->truncate('users');

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
        ])->assignRole('player', 'novice');

        User::create([
            'name' => 'sumo',
            'email' => 'sumo@gmail.com',
            'email_verified_at' => now(),
            'password' => 'sumo1234',
        ])->assignRole('player', 'apprentice');

        User::create([
            'name' => 'sumerio',
            'email' => 'sumerio@gmail.com',
            'email_verified_at' => now(),
            'password' => 'sumerio1234'
        ])->assignRole('player', 'adept');

        $this->enableForeignKeys();
    }
}
