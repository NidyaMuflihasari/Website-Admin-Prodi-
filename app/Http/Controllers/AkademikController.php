<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Akademik;
use App\Models\Kategoriakademik;

class AkademikController extends Controller
{
    public function __construct()
    {
      $this-> Akademik = new Akademik();  
      $this-> Kategoriakademik = new Kategoriakademik();
      $this->middleware('auth');
    }

    public function index()
    {   
        $kat_aka = DB::table('kategoriakademik')->get();
        $data = [
            // 'data_akademik'=> $this -> Akademik-> with('kategoriakademik')->paginate(10),
            'data_akademik'=> $this -> Akademik-> with('kategoriakademik')->paginate(10),'data_kategori'=> $kat_aka
        ];
        return view('v_admin.Akademik.v_DataAkademik',$data);
    }

    public function create()
    {
        $data = [
            'kategori'=> $this -> Kategoriakademik->allData(),
        ];
        return view('v_admin.Akademik.v_TambahAkademik',$data);
    }

    public function store(Request $request)
    {
        Request()->validate([
            'judul_akademik' => 'required',
            'kategori_id'=> 'required',
            'file_akademik' => 'required|mimes:jpg,jpeg,png,bmp,pdf,xlx,xlxs,txt,csv,doc,docx|max:2048',
        ],[
            'judul_akademik.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
            'file_akademik.required'=> 'Wajib diisi!',
        ]);
        
        //simpan data
        $file = request()-> file_akademik;
        $fileName = request()->judul_akademik . '.' .$file->extension();
        $file-> move(public_path('akademik_Upload'), $fileName);

        $data=[
            'judul_akademik'=> request() ->judul_akademik,
            'kategori_id'=> request()->kategori_id,
            'file_akademik'=> $fileName,
        ];

        $this->Akademik->addData($data);
        return redirect('data-akademik')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        if (!$this -> Akademik->detailData($id)){
            abort(404);
        }
        $aka = [
            'kategori'=> $this -> Kategoriakademik->allData(),
        ];
        $data = [
            'data_akademik'=> $this -> Akademik->detailData($id),
        ];
        return view('v_admin.Akademik.v_DetailAkademik',$data,$aka);
    }

    public function edit($id)
    {
        if (!$this -> Akademik->detailData($id)){
            abort(404);
        }
        $aka = [
            'kategori'=> $this -> Kategoriakademik->allData(),
        ];
        $data = [
            'data_akademik'=> $this -> Akademik-> with('kategoriakademik')->findOrfail($id),
        ];
        return view('v_admin.Akademik.v_EditAkademik',$data,$aka);
    }

    public function update(Request $request, $id)
    {
        Request()->validate([
            'judul_akademik' => 'required',
            'kategori_id'=> 'required',
            'file_akademik' => 'mimes:jpg,jpeg,png,bmp,pdf,xlx,xlxs,txt,csv,doc,docx|max:2048',
        ],[
            'judul_akademik.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
        ]);

        if(request()->file_akademik<>""){
            //jika ingin ganti file
            // upload file
            $file = request()-> file_akademik;
            $fileName = request()->judul_akademik . '.' .$file->extension();
            $file-> move(public_path('akademik_Upload'), $fileName);

            $data=[
                'judul_akademik'=> request() ->judul_akademik,
                'kategori_id'=> request()->kategori_id,
                'file_akademik'=> $fileName,
            ];
            $this->Akademik->editData($id, $data);
        }else{
            // jika tidak ingin ganti file
            $data=[
                'judul_akademik'=> request() ->judul_akademik,
                'kategori_id'=> request()->kategori_id,
            ];
            $this->Akademik->editData($id, $data);
        }
                
        return redirect('data-akademik')->with('pesan','Data Berhasil Diperbarui!');

    }

    public function destroy($id)
    {
        $data_akademik = $this -> Akademik->detailData($id);
        if($data_akademik-> file_akademik <> ""){
            unlink(public_path('akademik_Upload'). '/' . $data_akademik->file_akademik);
        }
        $this->Akademik->deleteData($id);
        return redirect()->route('data-akademik')->with('pesan','Data Berhasil Di Hapus!');
    }
}
