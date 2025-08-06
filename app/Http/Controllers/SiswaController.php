<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas; // Tambahkan ini untuk memanggil model clas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  // Jika ingin enkripsi password

class SiswaController extends Controller
{
    // Fungsi untuk mengarahkan ke halaman index siswa
    public function index(){
        //menampilkan data di index

        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    // Fungsi untuk mengarahkan ke halaman create siswa
    public function create(){
        //siapkan data / panggil data kelas
        $clases = clas::all();
        
        return view('siswa.create', compact('clases'));
    }

    // Untuk menyimpan data siswa
    public function store(Request $request){
        // Validasi data
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'nisn'          => 'required|unique:users,nisn',
            'password'      => 'required',
            'class_id'      => 'required',
            'address'       => 'required',
            'no_handphone'  => 'required|unique:users,no_handphone',
            'foto'          => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        // Masukkan data ke dalam tabel user
        $datasiswa_store = [
            'name'          => $request->name,
            'email'         => $request->email,
            'nisn'          => $request->nisn,
            'password'      => $request->password,
            'clas_id'       => $request->class_id,
            'alamat'        => $request->address,
            'no_handphone'  => $request->no_handphone,
        ];

        //upload gambar
        $datasiswa_store['photo'] = $request->file('foto')->store('profilesiswa', 'public');

        // masukan data ke dalam tabel user 
        User::create($datasiswa_store);

        // Arahkan user ke halaman beranda
        return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }
}
