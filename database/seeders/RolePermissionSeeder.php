<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::where('name','admin')->first();
        $permissions = [
            'create-category',
            'view-categories',
            'update-category',
            'delete-category',

            'create-subcategory',
            'view-subcategories',
            'update-subcategory',
            'delete-subcategory',

            'create-product',
            'view-products',
            'update-product',
            'delete-product',

            'create-order',
            'view-orders',
            'update-order',
            'delete-order',

            'create-website-subscriber',
            'view-website-subscribers',
            'update-website-subscriber',
            'delete-website-subscriber',

            'create-website-contact',
            'view-website-contacts',
            'update-website-contact',
            'delete-website-contact',

            'create-website-visitor',
            'view-website-visitors',
            'update-website-visitor',
            'delete-website-visitor',

            'create-role',
            'view-roles',
            'update-role',
            'delete-role',

            'create-user',
            'view-users',
            'update-user',
            'delete-user',

            'create-setting',
            'view-setting',
            'update-setting',
            'delete-setting',
        ];

        foreach ($permissions as $permission) {
            // Create permission only if it doesn't exist
            if (!Permission::where('name', $permission)->exists()) {
                $newPermission = Permission::create(['name' => $permission]);
                $role->givePermissionTo($newPermission);
            }
        }
    }
}
