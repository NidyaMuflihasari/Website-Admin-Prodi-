<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kategoripengumuman;

class KategoriPengumumanController extends Controller
{
    public function __construct()
    {
      $this-> Kategoripengumuman = new Kategoripengumuman();
      $this->middleware('auth');
    }

    public function index()
    {  
        $kategoripengumuman = [
            'data_kategoripeng'=> $this ->Kategoripengumuman ->allData(),
        ];
        return view('v_admin.Pengumuman.v_KategoriPengumuman', $kategoripengumuman);
    }

    public function create()
    {
        return view('v_admin.Pengumuman.v_TambahKategoriPengumuman');
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

        $this->Kategoripengumuman->addData($data);
        return redirect('data-kategoripengumuman')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $this->Kategoripengumuman->deleteData($id);
        return redirect()->route('data-kategoripengumuman')->with('pesan','Data Berhasil Di Hapus!');
    }
}
