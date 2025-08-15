<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    //fungsi untuk mengarahkan ke halaman index kelas
    public function index(){
        //siapkan data / panggil data kelas
        $classes = Clas::all();

        //kembalikan data kelas ke halaman index
        return view('clas.index', compact('classes'));
    }

    //fungsi untuk mengarahkan ke halaman create kelas
    public function create(){
        //SIAPKAN DATA / PANGGIL DATA
            $class = Clas::all();


        //kembalikan data kelas ke halaman create
            return view('clas.create', compact('class'));
    }

    //untuk store kelas
    public function store(Request $request){
        //validasi data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //siapkan data yang akan dimasukkan
        $datakelas_store = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];

        //masuukkan data ke dalam table kelas
        Clas::create($datakelas_store);

        //arahkan user ke halaman index kelas
        return redirect('/clas')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function destroy($id){
        //cari data kelas berdasarkan id
        $dataclass = Clas::find($id);

        //cek apakah data kelas ada atau tidak
        if ($dataclass) {

            //hapus data kelas
            $dataclass->delete();

            return redirect('/clas')->with('error', 'Kelas tidak ditemukan');
        }

        //kembalikan data kelas ke halaman index kelas
        return redirect('/clas')->with('success', 'Kelas berhasil dihapus');
    }

    public function show($id){
        //cari data kelas berdasarkan id
        $datakelas = Clas::find($id);

        //cek apakah data kelas ada atau tidak
        if($datakelas == null){
            return redirect('/kelas')->with('error', 'Data siswa tidak ditemukan');
        }
        //kembalikan data kelas ke halaman show
        return view('clas.show', compact('datakelas'));

    }

    public function edit($id){
        //cari data kelas berdasarkan id
        $datakelas = Clas::find($id);

        //cek apakah data kelas ada atau tidak
        if($datakelas == null){
            return redirect('/clas')->with('error', 'Data kelas tidak ditemukan');
        }

        //kembalikan data kelas ke halaman edit
        return view('clas.edit', compact('datakelas'));
    }

    public function update(Request $request, $id){
        //validasi data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        //cari data kelas berdasarkan id
        $datakelas = Clas::find($id);

        if($datakelas == null){
            return redirect('/clas')->with('error', 'Data kelas tidak ditemukan');
        }

        //siapkan data yang akan diupdate
        $datakelas_update = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];

        //update data kelas
        $datakelas->update($datakelas_update);

        //arahkan user ke halaman index kelas
        return redirect('/clas')->with('success', 'Kelas berhasil diupdate');
    }
}