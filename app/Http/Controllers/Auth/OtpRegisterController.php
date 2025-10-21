<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OtpRegisterController extends Controller
{
    // Step 1: Send OTP
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);

        DB::table('email_otps')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'expires_at' => $expiresAt, 'updated_at' => now()]
        );

        Mail::to($request->email)->send(new SendOtpMail($otp));

        return response()->json(['message' => 'OTP sent successfully to ' . $request->email]);
    }

    // Step 2: Verify OTP and Register
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
            'otp'      => 'required|digits:6',
        ]);

        $record = DB::table('email_otps')->where('email', $request->email)->first();

        if (!$record) {
            return back()->with('error', 'OTP not found.');
        }

        if (Carbon::now()->greaterThan($record->expires_at)) {
            return back()->with('error', 'OTP expired. Please request a new one.');
        }

        if ($record->otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        // Create User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Delete OTP after success
        DB::table('email_otps')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Registration successful! You may now log in.');
    }
}
