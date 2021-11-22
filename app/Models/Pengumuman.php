<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengumuman extends Model
{
    protected $table = "pengumuman";
    protected $primarykey ="id";
    protected $fillable = ['id','judul_pengumuman','ketegori_id','file_pengumuman'];

    public function kategoripengumuman(){
        return $this->belongsTo(Kategoripengumuman::class);
    }

    public function allData(){
        return DB::table('pengumuman')->get();
    }

    public function detailData($id){
        return DB::table('pengumuman')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('pengumuman')->insert($data);
    }

    public function editData($id, $data){
        DB::table('pengumuman')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('pengumuman')->where('id', $id)->delete();
    }
}
