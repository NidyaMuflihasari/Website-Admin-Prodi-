<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Kategorikegiatan;

class Kegiatan extends Model
{
    protected $table = "kegiatan";
    protected $primarykey ="id";
    protected $fillable = ['id','nama_kegiatan','waktu_kegiatan','ketegori_id','deskripsi_kegiatan','foto_kegiatan'];

    public function kategorikegiatan(){
        return $this->belongsTo(Kategorikegiatan::class, 'id');
    }

    public function allData(){
        return DB::table('kegiatan')->get();
    }

    public function detailData($id){
        return DB::table('kegiatan')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('kegiatan')->insert($data);
    }

    public function editData($id, $data){
        DB::table('kegiatan')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('kegiatan')->where('id', $id)->delete();
    }
}
