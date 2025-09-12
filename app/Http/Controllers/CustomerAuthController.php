<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showRegisterForm()
    {
        return view('customer.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        try {
            $name = trim($request->first_name . ' ' . $request->last_name);

            $customer = Customer::create([
                'name'     => $name,
                'phone_no'  => $request->contact,
                'email'    => $request->email,
                'address'  => $request->address,
                'city'     => $request->city,
                'state'    => $request->state,
                'pin_code' => $request->pin_code,
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('customer')->login($customer);

            return redirect()->route('customer.wishlist')->with('success', 'Registration successful!');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        try {
            if (Auth::guard('customer')->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended(route('index'))
                    ->with('success', 'Welcome back, ' . Auth::guard('customer')->user()->name . '!');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('customer.login')->with('success', 'You have been logged out successfully.');
    }
}
