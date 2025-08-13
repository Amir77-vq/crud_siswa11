<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Clas; // Tambahkan ini untuk memanggil model clas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  // Jika ingin enkripsi password
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Fungsi untuk mengarahkan ke halaman index siswa
    public function index(){
    
    
    //siapkan data / panggil data siswa atau user
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    // Fungsi untuk mengarahkan ke halaman create siswa
    public function create(){
        //siapkan data / panggil data kelas
        $clases = Clas::all();
        
        return view('siswa.create', compact('clases'));
    }

    // Untuk menyimpan data siswa
    public function store(Request $request){
        // Validasi data
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|email|unique:users,email',
            'nisn'         => 'required|unique:users,nisn',
            'password'     => 'required',
            'clas_id'      => 'required', // ← sama dengan di form
            'address'      => 'required',
            'no_handphone' => 'required|unique:users,no_handphone',
            'foto'         => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

    // Masukkan data ke dalam tabel user
        $datasiswa_store = [
            'name'         => $request->name,
            'email'        => $request->email,
            'nisn'         => $request->nisn,
            'password'     => Hash::make($request->password),
            'clas_id'      => $request->clas_id, // ← sama
            'alamat'       => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'photo'        => $request->file('foto')->store('profilesiswa', 'public'),
        ];

     //upload gambar
    $datasiswa_store['photo'] = $request->file('foto')->store('profilesiswa', 'public');

    // masukan data ke dalam tabel user 
    User::create($datasiswa_store);

    // Arahkan user ke halaman beranda
    return redirect('/')->with('success', 'Data siswa berhasil disimpan');
    }
    //buat fungsi untuk delete data siswa
    public function destroy($id){
    //cari data user di database berdasarkan id user ada atau tidak
    $datasiswa = User::find($id);

    //cek apakah data user ada atau tidak
    if ($datasiswa != null){
    Storage::disk('public')->delete($datasiswa->photo);
    $datasiswa->delete();
    }

    //kembalikan user ke halaman home / beranda
    return redirect('/');

    }

    //untuk menampilkan view detail siswa
    public function show ($id){
    //cari data user di database berdasarkan id user
    $datauser = User::find($id);

    //cek apakah datanya ada atau tidak
    if ($datauser == null) {
    return redirect('/');
    }

    //kembalikan user ke halaman show dan kirimkan data user yang di ambil berdasarkan id
    return view('siswa.show', compact('datauser'));
    }

    public function edit($id){

    //siapkan data / panggil data
    $clases = Clas::all();


    //ambil data siswa berdasarkan id
    $datauser = User::find($id);

    //cek apakah datanya ada atau tidak
    if ($datauser == null) {
    return redirect('/');
    }


    return view('siswa.edit', compact('clases', 'datauser'));
    }

    //fungsi update data siswa
    public function update(Request $request, $id){
    //validasi data
        $request->validate([
            'name'          =>'required',
            'nisn'          =>'required',
            'alamat'        =>'required',
            'email'         =>'required',
            'no_handphone'  =>'required',
        ]);


    //cari di dalam tabel user apakah ada user yang akan di update
        $datasiswa = User::find($id);


    //siapkan data yang akan di simpan sebagai update
        $datasiswa_update=[
            'clas_id'      => $request->clas_id,
            'name'         => $request->name,
            'nisn'         => $request->nisn,
            'alamat'       => $request->address,
            'email'        => $request->email,
            'no_handphone' => $request->no_handphone,
        ];

    //simpan data ke dalam base dengan data yang terbaru sesuai update
    $datasiswa->update($datasiswa_update);


    //pindahkan user ke halaman beranda
    return redirect('/');
    }
}
