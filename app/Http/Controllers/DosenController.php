<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Psy\CodeCleaner\ValidConstructorPass;

class DosenController extends Controller
{
    public function __construct()
    {
      $this-> Dosen = new Dosen();
      $this->middleware('auth');  
    }

    public function index()
    {
        $data = [
            'dosen'=> $this -> Dosen->allData(),
        ];
        return view('v_admin.v_dosen',$data);
    }

    public function detail($id_dosen){
        if (!$this -> Dosen->detailData($id_dosen)){
            abort(404);
        }
        $data = [
            'dosen'=> $this -> Dosen->detailData($id_dosen),
        ];
        return view('v_admin.v_detailDosen',$data);
    }

    public function add(){
        return view('v_admin.v_addDosen');
    }
    
    public function insert(Request $request){
        // $nama=$request->input('nama_dosen');
        // var_dump(strlen($nama));
        Request()->validate([
            'nip' => 'required|unique:dosen|integer|digits_between :6,11',
            'nama_dosen' => 'required',
            'email_dosen' => 'required|email',
            's1' => 'required',
            's2' => 'required',
            'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[
            'nip.required'=> 'Wajib diisi!',
            'nip.unique'=> 'NIP ini sudah digunakan!',
            'nip.min'=> 'Min 6 karakter!',
            'nip.max'=> 'Max 11 karakter!',
            'nip.request'=> 'NIP harus berupa angka!',
            'nama_dosen.required'=> 'Wajib diisi!',
            'email_dosen.required'=> 'Wajib diisi!',
            'email_dosen.email'=> 'Email tidak valid!',
            's1.required'=> 'Wajib diisi!',
            's2.required'=> 'Wajib diisi!',
            'foto_dosen.required'=> 'Wajib diisi!',
        ]);
        
        //simpan data
        $file = request()-> foto_dosen;
        $fileName = request()->nip . '.' .$file->extension();
        $file-> move(public_path('foto_Dosen'), $fileName);

        $data=[
            'nip'=> request()-> nip,
            'nama_dosen'=> request()->nama_dosen,
            'email_dosen'=> request()->email_dosen,
            's1'=> request()->s1,
            's2'=> request()->s2,
            's3'=> request()->s3,
            'foto_dosen'=> $fileName,
        ];

        $this->Dosen->addData($data);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Ditambahkan!');
    }

    public function edit($id_dosen){
        if (!$this -> Dosen->detailData($id_dosen)){
            abort(404);
        }
        $data = [
            'dosen'=> $this -> Dosen->detailData($id_dosen),
        ];
        return view('v_admin.v_editDosen',$data);
    }

    public function update($id_dosen){
        Request()->validate([
            'nip' => 'required|integer|digits_between :6,11',
            'nama_dosen' => 'required',
            'email_dosen' => 'required|email',
            's1' => 'required',
            's2' => 'required',
            'foto_dosen' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ],[
            'nip.required'=> 'Wajib diisi!',
            'nip.min'=> 'Min 6 karakter!',
            'nip.max'=> 'Max 11 karakter!',
            'nip.request'=> 'NIP harus berupa angka!',
            'nama_dosen.required'=> 'Wajib diisi!',
            'email_dosen.required'=> 'Wajib diisi!',
            'email_dosen.email'=> 'Email tidak valid!',
            's1.required'=> 'Wajib diisi!',
            's2.required'=> 'Wajib diisi!',
        ]);

        if(request()->foto_dosen<>""){
            //jika ingin ganti foto
            // upload foto
            $file = request()-> foto_dosen;
            $fileName = request()->nip . '.' .$file->extension();
            $file-> move(public_path('foto_Dosen'), $fileName);

            $data=[
                'nip'=> request()-> nip,
                'nama_dosen'=> request()->nama_dosen,
                'email_dosen'=> request()->email_dosen,
                's1'=> request()->s1,
                's2'=> request()->s2,
                's3'=> request()->s3,
                'foto_dosen'=> $fileName,
            ];

            $this->Dosen->editData($id_dosen, $data);
        }else{
            // jika tidak ingin ganti foto
            $data=[
                'nip'=> request()-> nip,
                'nama_dosen'=> request()->nama_dosen,
                'email_dosen'=> request()->email_dosen,
                's1'=> request()->s1,
                's2'=> request()->s2,
                's3'=> request()->s3,
            ];
            $this->Dosen->editData($id_dosen, $data);
        }
                
        return redirect()->route('dosen')->with('pesan','Data Berhasil Di Update!');
    }

    public function delete($id_dosen){
        // Hapus Foto
        $dosen = $this -> Dosen->detailData($id_dosen);
        if($dosen-> foto_dosen <> ""){
            unlink(public_path('foto_Dosen'). '/' . $dosen->foto_dosen);
        }
        $this->Dosen->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Di Hapus!');
    }
}
