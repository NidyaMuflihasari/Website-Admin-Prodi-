<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primarykey = 'id';
    protected $fillable = ['nip','nama_dosen','email_dosen','s1','s2','s3','foto_dosen'];

    public function allData(){
        return DB::table('dosen')->get();
    }

    public function detailData($id_dosen){
        return DB::table('dosen')->where('id', $id_dosen)->first();
    }

    public function addData($data){
         DB::table('dosen')->insert($data);
    }

    public function editData($id_dosen, $data){
        DB::table('dosen')->where('id', $id_dosen)->update($data);
    }

    public function deleteData($id_dosen){
        DB::table('dosen')->where('id', $id_dosen)->delete();
    }
}
