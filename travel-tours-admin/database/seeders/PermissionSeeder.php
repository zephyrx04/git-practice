<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Kept for future extension; for now RolesAndAdminSeeder seeds permissions.
        $permissions = [];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }
    }
}
