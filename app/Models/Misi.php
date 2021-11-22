<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Misi extends Model
{
    protected $table = 'misi';
    protected $primarykey = 'id';
    protected $fillable = ['id','misi_prodi'];

    public function allData(){
        return DB::table('misi')->get();
    }

    public function detailData($id){
        return DB::table('misi')->where('id', $id)->first();
    }

    public function addData($data){
         DB::table('misi')->insert($data);
    }

    public function editData($id, $data){
        DB::table('misi')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('misi')->where('id', $id)->delete();
    }
}
