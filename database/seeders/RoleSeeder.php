<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'trivia simple',
                'trivia social',

                'question create',
                'question show',
                'question edit',
                'question delete',
            ]);

        Role::create(['name' => 'player']);

        Role::create(['name' => 'novice'])
            ->givePermissionTo([
                'trivia simple'
            ]);

        Role::create(['name' => 'apprentice'])
            ->givePermissionTo([
                'trivia simple',
                'trivia social',
                'question create',
                'question show',
            ]);

        Role::create(['name' => 'adept'])
            ->givePermissionTo([
                'trivia simple',
                'trivia social',
                'question create',
                'question show',
            ]);
    }
}
