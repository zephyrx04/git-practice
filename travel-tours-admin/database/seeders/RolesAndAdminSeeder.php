<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Define roles
        $roles = [
            'System Administrator',
            'Administrative Staff',
            'Legal Officer',
            'Management',
            'Receptionist',
        ];

        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Define a minimal permission set to start
        $permissions = [
            // User management & audit
            'user.manage', 'audit.view',
            // Documents
            'document.create', 'document.view', 'document.update', 'document.delete',
            // Reservations
            'reservation.create', 'reservation.view', 'reservation.update', 'reservation.delete', 'reservation.approve',
            // Legal
            'legal.view', 'legal.manage',
            // Visitors
            'visitor.create', 'visitor.view', 'visitor.update', 'visitor.checkout',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign permissions per role (basic policy)
        $map = [
            'System Administrator' => $permissions,
            'Administrative Staff' => [
                'document.create','document.view','document.update',
                'reservation.create','reservation.view','reservation.update',
                'visitor.create','visitor.view','visitor.update'
            ],
            'Legal Officer' => ['legal.view','legal.manage','document.view'],
            'Management' => ['audit.view','document.view','reservation.view','legal.view','visitor.view'],
            'Receptionist' => ['visitor.create','visitor.view','visitor.update','visitor.checkout'],
        ];

        foreach ($map as $roleName => $perms) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                $role->syncPermissions($perms);
            }
        }

        // Create initial admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole('System Administrator');
    }
}
