<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        // create roles and assign existing permissions
        $writeRole = Role::create(['name' => 'writer']);
        $writeRole->givePermissionTo('view posts');
        $writeRole->givePermissionTo('create posts');
        $writeRole->givePermissionTo('edit posts');
        $writeRole->givePermissionTo('delete posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');
        $adminRole->givePermissionTo('edit posts');
        $adminRole->givePermissionTo('delete posts');
        $adminRole->givePermissionTo('publish posts');
        $adminRole->givePermissionTo('unpublish posts');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        // writer
        $user = User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole($writeRole);

        // admin
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole($adminRole);

        // super-admin
        $user = User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $user->assignRole($superadminRole);
    }
}
