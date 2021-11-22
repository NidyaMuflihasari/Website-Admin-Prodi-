<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;

class Kategorikegiatan extends Model
{
    protected $table = "kategorikegiatan";
    protected $primarykey ="id";
    protected $fillable = ['id','kategori'];

    public function kegiatan(){
        return $this->hasMany(Kegiatan::class);
    }

    public function allData(){
        return DB::table('kategorikegiatan')->get();
    }

    public function detailData($id){
        return DB::table('kategorikegiatan')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('kategorikegiatan')->insert($data);
    }

    public function editData($id, $data){
        DB::table('kategorikegiatan')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('kategorikegiatan')->where('id', $id)->delete();
    }
}
