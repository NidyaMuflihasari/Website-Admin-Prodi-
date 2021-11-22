<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategoripengumuman extends Model
{
    protected $table = "kategoripengumuman";
    protected $primarykey ="id";
    protected $fillable = ['id','kategori'];

    public function pengumuman(){
        return $this->hasMany(Pengumuman::class);
    }

    public function allData(){
        return DB::table('kategoripengumuman')->get();
    }

    public function detailData($id){
        return DB::table('kategoripengumuman')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('kategoripengumuman')->insert($data);
    }

    public function editData($id, $data){
        DB::table('kategoripengumuman')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('kategoripengumuman')->where('id', $id)->delete();
    }
}
