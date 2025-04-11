<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    
    public function store(Request $request)
    {
        $lolos = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:255|unique:App\Models\User,username',
            'phone' => 'required|numeric|digits_between:10,13',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:App\Models\User,email',
            'password' => 'required|min:5|max:255'
        ]);
        $lolos['password'] = Hash::make($lolos['password']);
        User::create($lolos);
        //$request->session()->flash('success', 'Registration Complete, Request login');
        return redirect('/login')->with('success', 'Registration Complete, Request login');
    }
}
