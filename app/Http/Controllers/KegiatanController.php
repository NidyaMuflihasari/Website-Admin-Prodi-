<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Kategorikegiatan;

class KegiatanController extends Controller
{
    public function __construct()
    {
      $this-> Kegiatan = new Kegiatan();  
      $this-> Kategorikegiatan = new Kategorikegiatan();
      $this->middleware('auth');
    }

    public function index()
    {   
        // $data_pengumuman= Pengumuman::with('kategoripengumuman')->paginate(2);
        $kat_keg = DB::table('kategorikegiatan')->get();
        $data = [
            // 'data_pengumuman'= Pengumuman::with('kategoripengumuman')->allData(),
            // 'data_kegiatan'=> $this -> Kegiatan-> with('kategorikegiatan')->paginate(10),
            // 'data_kegiatan'=> $this -> Kegiatan-> with('kategorikegiatan')->get(),
            'data_kegiatan'=> $this -> Kegiatan-> with('kategorikegiatan')->paginate(10),'data_kategori'=> $kat_keg
        ];
        return view('v_admin.Kegiatan.v_DataKegiatan',$data);
    }

    public function create()
    {
        // $kategori= Kategoripengumuman::allData();
        $data = [
            'kategori'=> $this -> Kategorikegiatan->allData(),
        ];
        return view('v_admin.Kegiatan.v_TambahKegiatan',$data);
    }

    public function store(Request $request)
    {
        Request()->validate([
            'nama_kegiatan' => 'required',
            'waktu_kegiatan'=> 'required',
            'kategori_id'=>'required',
            'deskripsi_kegiatan'=>'required',
            'foto_kegiatan' => 'required|mimes:jpg,jpeg,png,bmp|max:2048',
        ],[
            'nama_kegiatan.required'=> 'Wajib diisi!',
            'waktu_kegiatan.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
            'deskripsi_kegiatan.required'=> 'Wajib diisi!',
            'foto_kegiatan.required'=> 'Wajib diisi!',
        ]);
        
        //simpan data
        $file = request()-> foto_kegiatan;
        $fileName = request()->nama_kegiatan . '.' .$file->extension();
        $file-> move(public_path('foto_Kegiatan'), $fileName);

        $data=[
            'nama_kegiatan'=> request() ->nama_kegiatan,
            'waktu_kegiatan'=> request()->waktu_kegiatan,
            'kategori_id'=> request()->kategori_id,
            'deskripsi_kegiatan'=> request()->deskripsi_kegiatan,
            'foto_kegiatan'=> $fileName,
        ];

        $this->Kegiatan->addData($data);
        return redirect('data-kegiatan')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        if (!$this -> Kegiatan->detailData($id)){
            abort(404);
        }
        $kat_keg = DB::table('kategorikegiatan')->get();
        $keg = [
            'kategori'=> $this -> Kategorikegiatan->allData(),
        ];
        $data = [
            'data_kegiatan'=> $this -> Kegiatan->detailData($id),
            'data_kategori'=> $kat_keg
        ];
        return view('v_admin.Kegiatan.v_DetailKegiatan',$data,$keg);
    }

    public function edit($id)
    {
        if (!$this -> Kegiatan->detailData($id)){
            abort(404);
        }
        $keg = [
            'kategori'=> $this -> Kategorikegiatan->allData(),
        ];
        $data = [
            'data_kegiatan'=> $this -> Kegiatan-> with('kategorikegiatan')->findOrfail($id),
        ];
        return view('v_admin.Kegiatan.v_EditKegiatan',$data,$keg);
    }

    public function update(Request $request, $id)
    {
        Request()->validate([
            'nama_kegiatan' => 'required',
            'waktu_kegiatan'=> 'required',
            'kategori_id'=>'required',
            'deskripsi_kegiatan'=>'required',
            'foto_kegiatan' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ],[
            'nama_kegiatan.required'=> 'Wajib diisi!',
            'waktu_kegiatan.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
            'deskripsi_kegiatan.required'=> 'Wajib diisi!',
        ]);

        if(request()->foto_kegiatan<>""){
            //jika ingin ganti foto
            // upload foto
            $file = request()-> foto_kegiatan;
            $fileName = request()->nama_kegiatan . '.' .$file->extension();
            $file-> move(public_path('foto_Kegiatan'), $fileName);

            $data=[
                'nama_kegiatan'=> request() ->nama_kegiatan,
                'waktu_kegiatan'=> request()->waktu_kegiatan,
                'kategori_id'=> request()->kategori_id,
                'deskripsi_kegiatan'=> request()->deskripsi_kegiatan,
                'foto_kegiatan'=> $fileName,
            ];
            $this->Kegiatan->editData($id, $data);

        }else{
            // jika tidak ingin ganti foto
            $data=[
                'nama_kegiatan'=> request() ->nama_kegiatan,
                'waktu_kegiatan'=> request()->waktu_kegiatan,
                'kategori_id'=> request()->kategori_id,
                'deskripsi_kegiatan'=> request()->deskripsi_kegiatan,
            ];
            $this->Kegiatan->editData($id, $data);
        }
                
        return redirect('data-kegiatan')->with('pesan','Data Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $data_kegiatan = $this -> Kegiatan->detailData($id);
        if($data_kegiatan-> foto_kegiatan <> ""){
            unlink(public_path('foto_Kegiatan'). '/' . $data_kegiatan->foto_kegiatan);
        }
        $this->Kegiatan->deleteData($id);
        return redirect()->route('data-kegiatan')->with('pesan','Data Berhasil Di Hapus!');
    }
}
