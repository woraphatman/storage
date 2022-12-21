<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class RegisterController extends Controller
{
    use RegistersUsers;
    public function showRegister()
{
    return view('auth.register');
}
public function registerUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);
   
    auth()->login($user);
    return redirect()->route('products.index');
}
    
}