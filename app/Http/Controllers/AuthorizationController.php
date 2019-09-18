<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AuthorizationController extends Controller
{
    public function view_user_roles()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('back-end/authorization/assign_user_role', compact('users','roles','permissions'));
    }

    public function update_user_roles(Request $request)
    {

        $user_id = User::where('id','=', $request->get('user_id'))->value('id');
        $role_ids = $request->get('role_id');

        $user = User::find($user_id);

        $user->roles()->sync($role_ids);
        return back();

    }

    public function view_role_permissions()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('back-end/authorization/assign_role_permission', compact('users','roles','permissions'));
    }

    public function update_role_permissions(Request $request)
    {

        $role_id = Role::where('id','=', $request->get('role_id'))->value('id');
        $permission_ids = $request->get('permission_id');

        $role = Role::find($role_id);

        $role->permissions()->sync($permission_ids);
        return back();

    }

    public function view_user_permissions()
    {
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('back-end/authorization/assign_user_permission', compact('users','roles','permissions'));
    }

    public function update_user_permissions(Request $request)
    {

        $user_id = User::where('id','=', $request->get('user_id'))->value('id');
        $permission_ids = $request->get('permission_id');

        $user = User::find($user_id);
        $user->permissions()->sync($permission_ids);
        return back();

    }

}
