<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoriakademik;

class KategoriAkademikController extends Controller
{
    public function __construct()
    {
      $this-> Kategoriakademik = new Kategoriakademik();
      $this->middleware('auth');
    }

    public function index()
    {  
        $kategoriakademik = [
            'data_kategoriaka'=> $this ->Kategoriakademik ->allData(),
        ];
        return view('v_admin.Akademik.v_KategoriAkademik', $kategoriakademik);
    }

    public function create()
    {
        return view('v_admin.Akademik.v_TambahKategoriAkademik');
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

        $this->Kategoriakademik->addData($data);
        return redirect('data-kategoriakademik')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $this->Kategoriakademik->deleteData($id);
        return redirect()->route('data-kategoriakademik')->with('pesan','Data Berhasil Di Hapus!');
    }
}
