<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Returns the login page
     * */
    public function login()
    {
        return view('login');
    }

    /**
     * Login function to handle login data
     * */
    public function loginSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('login-success', 'yes');
        }
        return redirect(route('login'))->with('login_error', 'error');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:8',
        ], [
            'email.unique' => 'This email is already associated with another account. Login!'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));


        $user->save();


        return redirect(route('login'))->with('registration_success', 'true');
    }

    public function logout()
    {
        if (Auth::check()) {
            return view('logout_confirmation');
        } else {
            return view('logout_confirmation')->with('no_user', 'true');
        }

    }

    public function logoutSubmit()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
