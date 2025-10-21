<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\EmailOtp;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CustomerAuthController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    // Show registration page
    public function showRegisterForm()
    {
        return view('customer.auth.register');
    }

    // Registration
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:customers,email',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        try {
            $name = trim($request->first_name . ' ' . $request->last_name);

            $customer = Customer::create([
                'name'       => $name,
                'phone_no'   => $request->contact,
                'email'      => $request->email,
                'address'    => $request->address,
                'city'       => $request->city,
                'state'      => $request->state,
                'pin_code'   => $request->pin_code,
                'password'   => Hash::make($request->password),
                'is_verified'=> false,
            ]);

            // Generate OTP
            $otp = rand(100000, 999999);

            EmailOtp::updateOrCreate(
                ['email' => $customer->email],
                ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(5)]
            );

            Mail::to($customer->email)->send(new SendOtpMail($otp));

            return redirect()->route('customer.otp.verify', ['email' => $customer->email])
                             ->with('success', 'Registration successful! Please check your email for OTP.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // Login (email + password → send OTP)
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->onlyInput('email');
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        EmailOtp::updateOrCreate(
            ['email' => $customer->email],
            ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(5)]
        );

        Mail::to($customer->email)->send(new SendOtpMail($otp));

        // Redirect to OTP page for login
        return redirect()->route('customer.otp.verify', ['email' => $customer->email])
                         ->with('success', 'OTP sent! Please check your email to complete login.');
    }

    // Show OTP verification page (registration or login)
    public function showOtpForm(Request $request)
    {
        $email = $request->query('email');
        return view('customer.auth.otp_verify', compact('email'));
    }

    // Verify OTP (for registration or login)
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|digits:6',
        ]);

        $otpRecord = EmailOtp::where('email', $request->email)->first();

        if (!$otpRecord) {
            return redirect()->back()->with('error', 'OTP not found. Please try again.');
        }

        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            return redirect()->back()->with('error', 'OTP expired. Please try again.');
        }

        if ($otpRecord->otp != $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }

        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            $customer->is_verified = true;
            $customer->save();

            // ✅ Automatically log the customer in
            Auth::guard('customer')->login($customer);
        }

        // Delete OTP
        $otpRecord->delete();

        // Redirect to wishlist
        return redirect()->route('customer.wishlist')->with('success', 'Logged in successfully!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('customer.login')->with('success', 'Logged out successfully.');
    }
}
