<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // menampilkan halaman login
    public function Login()
    {
        $title = 'Halaman Login';

        return view("auth.login", compact('title'));
    }

    // proses login
    public function proses_login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "password" => "required"
            ],
            [
                "required" => ":attribute Wajib diisi"
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->with("errors", $error)->withInput($request->all());
        }

        // $email = $request->email;
        // $password = Hash::make($request->password);

        if (Auth::attempt($request->only("email", "password"))) {
            return redirect()->route("dashboard")->with("berhasil", "Berhasil Login!");
        } else {
            return back()->with("gagal", "email dan password tidak cocok!");
        }
    }

    // logout
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route("login")->with("berhasil", "Berhasil Logout");
    }
}
