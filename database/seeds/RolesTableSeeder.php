<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Dev',
            'slug' => 'dev'
        ]);
        Role::create([
            'name' => 'Admin User',
            'slug' => 'admin-user'
        ]);
        Role::create([
            'name' => 'Normal User',
            'slug' => 'normal-user'
        ]);
    }
}
