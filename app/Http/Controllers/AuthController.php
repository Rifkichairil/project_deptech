<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\Verification;
use App\Models\Accounts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login() : View {
        return view('pages.login');
    }

    public function register() : View {
        return view('pages.register');
    }

    public function auth(AuthRequest $request) : RedirectResponse {
        $credentials = [
            'email'      => $request->email,
            'password'   => $request->password,
            'role'       => 99,
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error-message', 'Periksa kembali email dan password admin anda.');
    }

    public function store(RegisterRequest $request) {
        DB::beginTransaction();
        try {
            $password = Str::random(8);

            $account = Accounts::create([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'password'      => Hash::make($password),
                'role'          => 99
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        Mail::to($account->email)->send(new Verification($password));

        return redirect()->route('login')->with('success-message', 'Berhasil mendaftar sebagai admin, silahkan cek password diemail anda.');
    }

    public function logout(Request $request) : RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
