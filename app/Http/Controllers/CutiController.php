<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    // menampilkan halaman cuti
    public function index()
    {
        $title = 'Cuti';
        $cuti = Cuti::select('cutis.*', 'pegawais.nama_depan', 'pegawais.nama_belakang')->join('pegawais', 'cutis.pegawai_id', 'pegawais.id')->get();

        return view('cuti.index', compact('title', 'cuti'));
    }

    // menampilkan halaman tambah cuti
    public function create()
    {
        $title = 'Tambah Cuti';
        $pegawai = Pegawai::get();
        
        return view('cuti.add', compact('title', 'pegawai'));
    }

    // Proses tambah cuti
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pegawai' => 'required',
            'alasan_cuti' => 'required',
            'mulai_cuti' => 'required',
            'selesai_cuti' => 'required', 
        ], 
        [
            'required' => ':attribute wajib diisi'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $cuti = Cuti::where('pegawai_id', $request->pegawai)->whereYear('mulai_cuti', date('Y'))->count();
        if ($cuti >= 5) {
            return '<script>
                alert("Cuti sudah melebihi batas maksimal.");
                window.location.href = "'.route('cuti.add').'"
                </script>';
        } else {
            Cuti::create([
                'pegawai_id' => $request->pegawai,
                'alasan_cuti' => $request->alasan_cuti,
                'mulai_cuti' => $request->mulai_cuti,
                'selesai_cuti' => $request->selesai_cuti,
            ]);
        }

        return redirect()->route('cuti')->with('berhasil', 'Berhasil menambahkan cuti.');
    }

    // Menampilkan halaman edit cuti
    public function edit($id)
    {
        $title = 'Edit Cuti';
        $cuti = Cuti::find($id);
        $pegawai = Pegawai::get();

        return view('cuti.edit', compact('title', 'cuti', 'pegawai'));
    }

    // Proses update cuti
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pegawai' => 'required',
            'alasan_cuti' => 'required',
            'mulai_cuti' => 'required',
            'selesai_cuti' => 'required', 
        ], 
        [
            'required' => ':attribute wajib diisi'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $cuti = Cuti::find($id);
        $cuti->pegawai_id = $request->pegawai;
        $cuti->alasan_cuti = $request->alasan_cuti;
        $cuti->mulai_cuti = $request->mulai_cuti;
        $cuti->selesai_cuti = $request->selesai_cuti;
        $cuti->save();

        return redirect()->route('cuti')->with('berhasil', 'Berhasil mengupdate cuti.');
    }

    // Proses hapus cuti
    public function destroy($id)
    {
        $cuti = Cuti::find($id);
        $cuti->delete();

        return redirect()->route('cuti')->with('berhasil', 'Berhasil menghapus cuti.');
    }
}
