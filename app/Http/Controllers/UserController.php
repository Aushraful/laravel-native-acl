<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        /*if (Auth::user()->can('view-user')){
            $users = User::all();
            return view('back-end/user/user_list', compact('users'));
        }else{
            return abort(403);
        }*/
        $users = DB::table('users')->orderBy('status')->get();
//        $users = User::all();
        return view('back-end/user/user_list', compact('users'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('back-end/user/add_user', compact('roles'));
    }


    public function store(Request $request)
    {
        User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'avatar' => $request->avatar,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user_id = User::where('email','=',$request->email)->value('id');
        $user = User::find($user_id);
        $user->roles()->sync($request->role_id);

        return redirect('/users');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('back-end/user/edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'avatar' => $request->avatar,
//            'email' => $request->email,
        ]);
        return redirect('/users');
    }

    public function statuscontroll(Request $request, $id)
    {
//        $status = User::where('id','=',$id)->value('status');

        switch ($request['action']) {

            case 'pending':

                User::findOrFail($id)->update([
                    'status' => 'pending'
                ]);

                return back();

                break;

            case 'approved':

                User::findOrFail($id)->update([
                    'status' => 'approved'
                ]);

                return back();

                break;

            case 'disapproved':

                User::findOrFail($id)->update([
                    'status' => 'disapproved'
                ]);

                return back();

                break;

        }

    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back();
    }
}
