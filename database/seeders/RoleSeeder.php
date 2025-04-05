<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super_admin role with web guard
        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web'
        ]);
        
        // Optionally, you can create permissions and assign them to the role
        // For example:
        // $manageUsersPermission = Permission::create(['name' => 'manage users', 'guard_name' => 'web']);
        // $superAdminRole->givePermissionTo($manageUsersPermission);
    }
}