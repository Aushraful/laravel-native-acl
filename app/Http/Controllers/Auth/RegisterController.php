<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $message = array(
            'username.regex' => 'Wrong Format, username must contain only small letters "a-z" and only three hyphens "-""'
        );

        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:70'],
            'username' => ['required','regex:/^[a-zA-Z\-]+$/','unique:users,username','min:4', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $message);
    }

    protected function create(array $data)
    {
        User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user = User::where('email','=',$data['email'])->first();
        $role = Role::where('slug','=','normal-user')->first();
        $user->roles()->sync($role);

        return User::where('email','=',$data['email'])->first();
    }
}
