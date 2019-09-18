<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        User::create([
            'full_name' => 'Developer',
            'username' => 'dev',
            'email'    => 'dev@gmail.com',
            'password' => Hash::make('11111111'),
            'status' => 'approved'
        ]);
        $role = Role::where('slug','=','dev')->first();
        $user = User::where('email','=','dev@gmail.com')->first();
        $user->roles()->sync($role);

        User::create([
            'full_name' => 'Administrator',
            'username' => 'admin-user',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
        $role = Role::where('name','=','admin')->first();
        $user = User::where('email','=','admin@gmail.com')->first();
        $user->roles()->sync($role);

        User::create([
            'full_name' => 'Normal User',
            'username' => 'user1',
            'email'    => 'user1@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
        $role = Role::where('name','=','normal-user')->first();
        $user = User::where('email','=','user1@gmail.com')->first();
        $user->roles()->sync($role);

    }

}
