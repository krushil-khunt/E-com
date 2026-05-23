<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Order;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view("register");
    }
    public function register(Request $request)
    {
        // Validation - email unique check સાથે
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }
    public function showLogin()
    {

        return view("login");

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Check કર કે user exist કરે છે કે નહીં
        $userExists = User::where('email', $request->input("email"))->first();

        if (!$userExists) {
            // User નથી → Register page પર મોકલ
            return redirect('/register')->with(
                'warning',
                '⚠️ આ email થી કોઈ account નથી! પહેલા Sign Up કરો.'
            );
        }

        $check = Auth::attempt([
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ]);

        if ($check) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            }
            return redirect('/display');
        } else {
            return redirect('/login')->with('error', '❌ Password ખોટો છે! ફરી try કરો.');
        }
    }

    public function dashboard()
    {
        return redirect('/display');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function admin()
    {
        $products = Product::count();

        $orders = Order::count();

        $revenue = Order::sum('total');

        $users = User::count();

        return view(
            'admin.dashboard',
            compact(
                'products',
                'orders',
                'revenue',
                'users'
            )
        );
    }

    public function users()
    {
        $users = User::all();

        return view(
            'admin.users',
            compact('users')
        );
    }

    public function deleteuser($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->back();
    }
}
