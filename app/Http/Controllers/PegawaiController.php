<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    // menampilkan halaman pegawai
    public function index()
    {
        $title = 'Pegawai';
        $pegawai = Pegawai::get();

        return view('pegawai.index', compact('title', 'pegawai'));
    }

    // menampilkan halaman tambah pegawai
    public function create()
    {
        $title = 'Tambah Pegawai';
        
        return view('pegawai.add', compact('title'));
    }

    // Proses tambah pegawai
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required', 
            'alamat' => 'required', 
            'jenis_kelamin' => 'required', 
        ], 
        [
            'required' => ':attribute wajib diisi'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        Pegawai::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('pegawai')->with('berhasil', 'Berhasil menambahkan pegawai.');
    }

    // Menampilkan halaman edit pegawai
    public function edit($id)
    {
        $title = 'Edit Pegawai';
        $pegawai = Pegawai::find($id);

        return view('pegawai.edit', compact('title', 'pegawai'));
    }

    // Proses update pegawai
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required', 
            'alamat' => 'required', 
            'jenis_kelamin' => 'required', 
        ], 
        [
            'required' => ':attribute wajib diisi'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $pegawai = Pegawai::find($id);
        $pegawai->nama_depan = $request->nama_depan;
        $pegawai->nama_belakang = $request->nama_belakang;
        $pegawai->email = $request->email;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->alamat = $request->alamat;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->save();

        return redirect()->route('pegawai')->with('berhasil', 'Berhasil mengupdate pegawai.');
    }

    // Proses hapus pegawai
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return redirect()->route('pegawai')->with('berhasil', 'Berhasil menghapus pegawai.');
    }
}
