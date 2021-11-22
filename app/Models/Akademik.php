<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akademik extends Model
{
    protected $table = "akademik";
    protected $primarykey ="id";
    protected $fillable = ['id','judul_akademik','ketegori_id','file_akademik'];

    public function kategoriakademik(){
        return $this->belongsTo(Kategoriakademik::class);
    }

    public function allData(){
        return DB::table('akademik')->get();
    }

    public function detailData($id){
        return DB::table('akademik')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('akademik')->insert($data);
    }

    public function editData($id, $data){
        DB::table('akademik')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('akademik')->where('id', $id)->delete();
    }
}
