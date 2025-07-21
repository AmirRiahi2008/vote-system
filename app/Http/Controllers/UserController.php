<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginView()
    {
        return view("auth.login");
    }

    public function registerView()
    {
        return view("auth.register");

    }
    public function login(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|string|max:255",
            "password" => "required|string"
        ]);
       $user = User::where('username', $validate['name'])->first();

        if (!$user || !Hash::check($validate["password"], $user->password)) {
            return back()->withErrors([
                'name' => "Invalid Username"
            ])->withInput();
        }
        Auth::login($user);
        return redirect('/');

    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::create([
            'username' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route("loginView");
    }
       public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
