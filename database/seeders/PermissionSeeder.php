<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $questions_permissions = [
            'question create',
            'question show',
            'question edit',
            'question delete'
        ];

        foreach ($questions_permissions as $permission_name) {
            Permission::create(['name' => $permission_name]);
        }

        $trivia_permissions = [
            'trivia simple',
            'trivia social'
        ];

        foreach ($trivia_permissions as $permission_name) {
            Permission::create(['name' => $permission_name]);
        }

    }
}
