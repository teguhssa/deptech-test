<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // halaman profile
    public function index()
    {
        $title = "Profile";
        return view("profile.index", compact("title"));
    }

    // MEnampilkan halaman edit
    public function edit($id)
    {
        $title = "Profile Edit";
        $user = User::find($id);

        return view('profile.edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors);
        }

        $user = User::find($id);
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->email = $request->email;
        if ($request->password <> '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('profile')->with('berhasil', 'Berhasil mengupdate profile.');
        
    }
}
