<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategoriakademik extends Model
{
    protected $table = "kategoriakademik";
    protected $primarykey ="id";
    protected $fillable = ['id','kategori'];

    public function akademik(){
        return $this->hasMany(Akademik::class);
    }

    public function allData(){
        return DB::table('kategoriakademik')->get();
    }

    public function detailData($id){
        return DB::table('kategoriakademik')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('kategoriakademik')->insert($data);
    }

    public function editData($id, $data){
        DB::table('kategoriakademik')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('kategoriakademik')->where('id', $id)->delete();
    }
}
