<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'admin'      => $admin->id,
                'admin_name' => $admin->name,
                'admin_email'=> $admin->email,
            ]);
            return redirect()->route('admin.dashboard')
                             ->with('success', 'Welcome back, ' . $admin->name . '!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout()
    {
        session()->forget(['admin', 'admin_name', 'admin_email']);
        return redirect()->route('admin.login')
                         ->with('success', 'You have been logged out.');
    }
}
