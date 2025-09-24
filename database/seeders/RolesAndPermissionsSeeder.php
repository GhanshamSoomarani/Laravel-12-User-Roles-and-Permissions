<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 🔹 Define all permissions
        $permissions = [
            // Role management
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            // Contract management
            'contract-list',
            'contract-create',
            'contract-edit',
            'contract-delete',

            // Bidding
            'contract-bid',

            // User & system management
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            // Extra / reports
            'view-reports',
        ];

        // 🔹 Create permissions if they don’t exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 🔹 Create roles
        $adminRole   = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $userRole    = Role::firstOrCreate(['name' => 'user']);

        // 🔹 Assign permissions to roles
        // Admin = full access
        $adminRole->syncPermissions(Permission::all());

        // Manager = contracts + bidding + reports
        $managerRole->syncPermissions([
            'contract-list',
            'contract-create',
            'contract-edit',
            'contract-delete',
            'contract-bid',
            'view-reports',
        ]);

        // User = can view contracts + bid
        $userRole->syncPermissions([
            'contract-list',
            'contract-bid',
        ]);

        // 🔹 (Optional) Create an admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name'     => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->assignRole($adminRole);
    }
}
