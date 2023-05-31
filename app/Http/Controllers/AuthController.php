<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            session(['loginId' => $user->id]);
            return redirect('dashboard');
        } else {
            echo '<script>alert("Wrong credentials, please try again");</script>';
            echo '<script>window.location.href = "login";</script>';
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();
        if ($result){
            echo '<script>alert("You are successfully registered");</script>';
            echo '<script>window.location.href = ("login");</script>';
        }else{
            echo '<script>alert("Try again")</script>';
        }

    }

    public function register()
    {
        return view ('auth.register');
    }

    public function dashboard()
    {
        $data = null;
        if (session()->has('loginId')) {
            $data = User::find(session('loginId'));
        }
        return view('dashboard', compact('data'));
    }

    public function logout()
    {
        session()->forget('loginId');
        return redirect('login');
    }
}    
