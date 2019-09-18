<?php

namespace App\Http\Controllers;

use App\Role;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('back-end/role/role_list', compact('roles'));
    }

    public function create()
    {
        return view('back-end/role/add_role');
    }

    public function store(Request $request)
    {
        $role_name = $request->role_name;

        Role::create([
            'name' => $role_name,
            'slug' => str_slug($role_name),
        ]);

        return redirect('/roles');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('back-end/role/edit_role', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = $request->role_name;

        Role::findOrFail($id)->update([
            'name' => $role,
            'slug' => str_slug($role),
        ]);
        return redirect('/roles');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return back();
    }
}
