<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorikegiatan;

class KategoriKegiatanController extends Controller
{
    public function __construct()
    {
      $this-> Kategorikegiatan = new Kategorikegiatan();
      $this->middleware('auth');
    }

    public function index()
    {  
        $kategorikegiatan = [
            'data_kategorikeg'=> $this ->Kategorikegiatan ->allData(),
        ];
        return view('v_admin.Kegiatan.v_KategoriKegiatan', $kategorikegiatan);
    }

    public function create()
    {
        return view('v_admin.Kegiatan.v_TambahKategoriKegiatan');
    }

    public function store(Request $request)
    {
        Request()->validate([
            'kategori' => 'required',
        ],[
            'kategori.required'=> 'Wajib diisi!',
        ]);

        $data=[
            'kategori'=> request() ->kategori,
        ];

        $this->Kategorikegiatan->addData($data);
        return redirect('data-kategorikegiatan')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $this->Kategorikegiatan->deleteData($id);
        return redirect()->route('data-kategorikegiatan')->with('pesan','Data Berhasil Di Hapus!');
    }
}
