<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas; // untuk model kelas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Halaman index siswa
    public function index(){
        // siapkan data siswa
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    // Halaman tambah siswa
    public function create(){
        // siapkan data kelas
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    // Simpan siswa baru
    public function store(Request $request){
        // Validasi
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'nisn'         => 'required|unique:users,nisn',
            'password'     => 'required',
            'clas_id'      => 'required',
            'alamat'       => 'required', // konsisten 'alamat'
            'no_handphone' => 'required|unique:users,no_handphone',
            'foto'         => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        // Siapkan data
        $datasiswa_store = [
            'name'         => $request->name,
            'email'        => $request->email,
            'nisn'         => $request->nisn,
            'password'     => Hash::make($request->password),
            'clas_id'      => $request->clas_id,
            'alamat'       => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'photo'        => $request->file('foto')->store('profilesiswa', 'public'),
        ];

        // Simpan ke database
        User::create($datasiswa_store);

        // Redirect
        return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }

    // Hapus siswa
    public function destroy($id){
        $datasiswa = User::find($id);

        if ($datasiswa != null){
            Storage::disk('public')->delete($datasiswa->photo);
            $datasiswa->delete();
        }

        return redirect('/')->with('success', 'Data siswa berhasil dihapus');
    }

    // Detail siswa
    public function show($id){
        $datauser = User::find($id);

        if ($datauser == null) {
            return redirect('/')->with('error', 'Data siswa tidak ditemukan');
        }

        return view('siswa.show', compact('datauser'));
    }

    // Edit siswa
    public function edit($id){
        $clases = Clas::all();
        $datauser = User::find($id);

        if ($datauser == null) {
            return redirect('/')->with('error', 'Data siswa tidak ditemukan');
        }

        return view('siswa.edit', compact('clases', 'datauser'));
    }

    // Update siswa
    public function update(Request $request, $id){
        // Validasi
        $request->validate([
            'name'          => 'required',
            'nisn'          => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_handphone'  => 'required',
        ]);

        // Ambil data
        $datasiswa = User::find($id);

        // Siapkan data update
        $datasiswa_update = [
            'clas_id'      => $request->class_id,
            'name'         => $request->name,
            'nisn'         => $request->nisn,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'no_handphone' => $request->no_handphone,
        ];

        // Update password jika ada
        if($request->password != null){
            $datasiswa_update['password'] = Hash::make($request->password);
        }

        // Update foto jika ada
        if($request->hasFile('foto')){
            Storage::disk('public')->delete($datasiswa->photo);
            $datasiswa_update['photo'] = $request->file('foto')->store('profilesiswa', 'public');
        }

        // Simpan update
        $datasiswa->update($datasiswa_update);

        // Redirect
        return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }
}
