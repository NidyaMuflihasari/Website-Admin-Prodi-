<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Kategoripengumuman;

class PengumumanController extends Controller
{
    public function __construct()
    {
      $this-> Pengumuman = new Pengumuman();  
      $this-> Kategoripengumuman = new Kategoripengumuman();
      $this->middleware('auth');
    }

    public function index()
    {   
        // $data_pengumuman= Pengumuman::with('kategoripengumuman')->paginate(2);
        $kat_peng = DB::table('kategoripengumuman')->get();
        $data = [
            // 'data_pengumuman'= Pengumuman::with('kategoripengumuman')->allData(),
            // 'data_pengumuman'=> $this -> Pengumuman-> with('kategoripengumuman')->paginate(10),
            'data_pengumuman'=> $this -> Pengumuman-> with('kategoripengumuman')->paginate(10)
            ,'data_kategori'=> $kat_peng
        ];
        return view('v_admin.Pengumuman.v_DataPengumuman',$data);
    }

    public function create()
    {
        // $kategori= Kategoripengumuman::allData();
        $data = [
            'kategori'=> $this -> Kategoripengumuman->allData(),
        ];
        return view('v_admin.Pengumuman.v_TambahPengumuman',$data);
    }

    public function store(Request $request)
    {
        Request()->validate([
            'judul_pengumuman' => 'required',
            'kategori_id'=> 'required',
            'file_pengumuman' => 'required|mimes:jpg,jpeg,png,bmp,pdf,xlx,xlxs,txt,csv,doc,docx|max:2048',
        ],[
            'judul_pengumuman.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
            'file_pengumuman.required'=> 'Wajib diisi!',
        ]);
        
        //simpan data
        $file = request()-> file_pengumuman;
        $fileName = request()->judul_pengumuman . '.' .$file->extension();
        $file-> move(public_path('pengumuman_Upload'), $fileName);

        $data=[
            'judul_pengumuman'=> request() ->judul_pengumuman,
            'kategori_id'=> request()->kategori_id,
            'file_pengumuman'=> $fileName,
        ];

        $this->Pengumuman->addData($data);
        return redirect('data-pengumuman')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        if (!$this -> Pengumuman->detailData($id)){
            abort(404);
        }
        $peng = [
            'kategori'=> $this -> Kategoripengumuman->allData(),
        ];
        $data = [
            'data_pengumuman'=> $this -> Pengumuman->detailData($id),
        ];
        return view('v_admin.Pengumuman.v_DetailPengumuman',$data,$peng);
    }

    public function edit($id)
    {
        // $info = Pengumuman::findorfail($id);
        if (!$this -> Pengumuman->detailData($id)){
            abort(404);
        }
        // $data_peng= Kategoripengumuman::allData();
        // $data_pengumuman= Pengumuman::with('kategoripengumuman')->findOrFail($id);
        $peng = [
            'kategori'=> $this -> Kategoripengumuman->allData(),
        ];
        $data = [
            'data_pengumuman'=> $this -> Pengumuman-> with('kategoripengumuman')->findOrfail($id),
        ];
        return view('v_admin.Pengumuman.v_EditPengumuman',$data,$peng);
    }

    public function update(Request $request, $id)
    {
        // $info = Pengumuman::findorfail($id);
        // $info->update($request->all());
        // return redirect('data-pengumuman')->with('pesan','Data Berhasil Diperbarui!');
        Request()->validate([
            'judul_pengumuman' => 'required',
            'kategori_id'=> 'required',
            'file_pengumuman' => 'mimes:jpg,jpeg,png,bmp,pdf,xlx,xlxs,txt,csv,doc,docx|max:2048',
        ],[
            'judul_pengumuman.required'=> 'Wajib diisi!',
            'kategori_id.required'=> 'Wajib diisi!',
        ]);

        if(request()->file_pengumuman<>""){
            //jika ingin ganti foto
            // upload foto
            $file = request()-> file_pengumuman;
            $fileName = request()->judul_pengumuman . '.' .$file->extension();
            $file-> move(public_path('pengumuman_Upload'), $fileName);

            $data=[
                'judul_pengumuman'=> request() ->judul_pengumuman,
                'kategori_id'=> request()->kategori_id,
                'file_pengumuman'=> $fileName,
            ];
            $this->Pengumuman->editData($id, $data);
            // $this->Pengumuman->findorfail($id)->update($data);
            // $this->Pengumuman->findorfail($id);
            // $this->Pengumuman->update($request->all());
        }else{
            // jika tidak ingin ganti foto
            $data=[
                'judul_pengumuman'=> request() ->judul_pengumuman,
                'kategori_id'=> request()->kategori_id,
            ];
            $this->Pengumuman->editData($id, $data);
            // $this->Pengumuman->findorfail($id)->update($data);
            // $this->Pengumuman->findorfail($id);
            // $this->Pengumuman->update($request->all());
        }
                
        return redirect('data-pengumuman')->with('pesan','Data Berhasil Diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengumuman = $this -> Pengumuman->detailData($id);
        if($data_pengumuman-> file_pengumuman <> ""){
            unlink(public_path('pengumuman_Upload'). '/' . $data_pengumuman->file_pengumuman);
        }
        $this->Pengumuman->deleteData($id);
        return redirect()->route('data-pengumuman')->with('pesan','Data Berhasil Di Hapus!');
    }
}
