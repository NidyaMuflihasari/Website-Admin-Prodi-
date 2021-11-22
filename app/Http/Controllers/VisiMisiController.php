<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Misi;
use App\Models\Visi;

class VisiMisiController extends Controller
{
    public function __construct()
    {
      $this-> Misi = new Misi();  
      $this-> Visi = new Visi(); 
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datavisi = [
            'data_visi'=> $this -> Visi->allData(),
        ];
        $datamisi = [
            'data_misi'=> $this -> Misi->allData(),
        ];
        return view('v_admin.VisiMisi.v_DataVisiMisi', $datavisi, $datamisi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMisi()
    {
        return view('v_admin.VisiMisi.Misi.v_TambahMisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMisi(Request $request)
    {
        Request()->validate([
            'misi_prodi' => 'required',
        ],[
            'misi_prodi.required'=> 'Wajib diisi!',
        ]);

        $data=[
            'misi_prodi'=> request()-> misi_prodi,
        ];
        $this->Misi->addData($data);
        return redirect()->route('data-visimisi')->with('pesan','Data Berhasil Di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMisi($id)
    {
        if (!$this -> Misi->detailData($id)){
            abort(404);
        }
        $data = [
            'data_misi'=> $this -> Misi->detailData($id),
        ];
        return view('v_admin.VisiMisi.Misi.v_DetailMisi',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMisi($id)
    {
        if (!$this -> Misi->detailData($id)){
            abort(404);
        }
        $data = [
            'data_misi'=> $this -> Misi->detailData($id),
        ];
        return view('v_admin.VisiMisi.Misi.v_EditMisi',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMisi(Request $request, $id)
    {
        Request()->validate([
            'misi_prodi' => 'required',
        ],[
            'misi_prodi.required'=> 'Wajib diisi!',
        ]);

        $data=[
            'misi_prodi'=> request()-> misi_prodi,
        ];
        $this->Misi->editData($id, $data);
        return redirect()->route('data-visimisi')->with('pesan','Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMisi($id)
    {
        // $data_misi = $this -> Misi->detailData($id);
        $this->Misi->deleteData($id);
        return redirect()->route('data-visimisi')->with('pesan','Data Berhasil Di Hapus!');
    }

    public function showVisi($id)
    {
        if (!$this -> Visi->detailData($id)){
            abort(404);
        }
        $data = [
            'data_visi'=> $this -> Visi->detailData($id),
        ];
        return view('v_admin.VisiMisi.Visi.v_DetailVisi',$data);
    }

    public function editVisi($id)
    {
        if (!$this -> Visi->detailData($id)){
            abort(404);
        }
        $data = [
            'data_visi'=> $this -> Visi->detailData($id),
        ];
        return view('v_admin.VisiMisi.Visi.v_EditVisi',$data);
    }

    public function updateVisi(Request $request, $id)
    {
        Request()->validate([
            'visi_prodi' => 'required',
        ],[
            'visi_prodi.required'=> 'Wajib diisi!',
        ]);

        $data=[
            'visi_prodi'=> request()-> visi_prodi,
            ];
        $this->Visi->editData($id, $data);
        return redirect()->route('data-visimisi')->with('pesan','Data Berhasil Di Update!');
    }
}
