<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginForm()
    {
        return response()
            ->view('auth.login', [
                'title' => 'Login Form',
            ])
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home')->with(['success' => 'Login Successfully !!!']);
        }

        return redirect()->back()->with('error', 'Invalid Email & Password !!!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out !!!!');
    }
    public function showRegisterForm()
    {
        return view('auth.register', [
            'title' => 'Register User',
        ]);
    }
    public function secret_registration(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        $exist_email = User::where('email', $request->input('email'))->first();

        if ($exist_email){
            return redirect('/')->with(['error' => 'Username Email Alredy Exist !!!']);
        }

        $data_user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ];

        $insert_data_user = User::create($data_user);

        if ($insert_data_user) {
            return redirect('/')->with(['success' => 'Successful register user !!!!']);
        } else {
            return redirect('/')->with(['error' => 'Error Register User !!!']);
        }
    }
}
