<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create([
            'name' => 'View User',
            'slug' => 'view-user'
        ]);
        $role = Role::where('slug','=','dev')->first();
        $permission = Permission::where('slug','=','view-user')->first();
        $permission->roles()->sync($role);

        Permission::create([
            'name' => 'Create User',
            'slug' => 'create-user'
        ]);
        $role = Role::where('slug','=','dev')->first();
        $permission = Permission::where('slug','=','create-user')->first();
        $permission->roles()->sync($role);

        Permission::create([
            'name' => 'Update User',
            'slug' => 'update-user'
        ]);
        $role = Role::where('slug','=','dev')->first();
        $permission = Permission::where('slug','=','update-user')->first();
        $permission->roles()->sync($role);

        Permission::create([
            'name' => 'Delete User',
            'slug' => 'delete-user'
        ]);
        $role = Role::where('slug','=','dev')->first();
        $permission = Permission::where('slug','=','delete-user')->first();
        $permission->roles()->sync($role);
    }
}
