<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Visi extends Model
{
    protected $table = "visi";
    protected $primarykey = "id";
    protected $fillable = ['id','visi_prodi'];

    public function allData(){
        return DB::table('visi')->get();
    }

    public function detailData($id){
        return DB::table('visi')->where('id', $id)->first();
    }

    public function addData($data){
        DB::table('visi')->insert($data);
    }

    public function editData($id, $data){
        DB::table('visi')->where('id', $id)->update($data);
    }

    public function deleteData($id){
        DB::table('visi')->where('id', $id)->delete();
    }
}
