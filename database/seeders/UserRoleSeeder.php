<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserRoleSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Flushes cached roles/permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Creates Users
        $admin_user = User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('secret'),
        ]);

        $creator_user = User::factory()->create([
            'id' => 2,
            'name' => 'Creator',
            'email' => 'creator@app.com',
            'password' => Hash::make('secret'),
        ]);

        // Defines list of permissions
        $permissions = [
            'users' => [
                'create users',
                'delete users'
            ],
            'roles' => [
                'assign roles',
                'create roles',
                'edit roles',
                'delete roles'
            ],
            'permissions' => [
                'assign permissions',
                'create permissions',
                'edit permissions',
                'delete permissions'
            ]
        ];

        // Create permissions
        foreach ($permissions as $model_permissions) {
            foreach ($model_permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }

        // Create/assign roles to users
        $admin_role = Role::create(['name' => 'super-admin'])->syncPermissions(Permission::all());
        $admin_user->assignRole($admin_role);


        $creator_role = Role::create(['name' => 'creator']);
        $creator_user->assignRole($creator_role);
    }
}
