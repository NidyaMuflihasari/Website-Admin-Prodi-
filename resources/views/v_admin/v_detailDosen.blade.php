@extends('templatesAdmin.v_templateAdmin')
@section('judul','Detail Dosen')
@section('content')

<table class="table">
    <tr>
        <th width="100px">NIP</th>
        <th width="30px">:</th>
        <th>{{ $dosen->nip }}</th>
    </tr>
    <tr>
        <th width="100px">Nama Dosen</th>
        <th width="30px">:</th>
        <th>{{ $dosen->nama_dosen }}</th>
    </tr>
    <tr>
        <th width="100px">Email</th>
        <th width="30px">:</th>
        <th>{{ $dosen->email_dosen }}</th>
    </tr>
    <tr>
        <th width="100px">S1</th>
        <th width="30px">:</th>
        <th>{{ $dosen->s1 }}</th>
    </tr>
    <tr>
        <th width="100px">S2</th>
        <th width="30px">:</th>
        <th>{{ $dosen->s2 }}</th>
    </tr>
    <tr>
        <th width="100px">S3</th>
        <th width="30px">:</th>
        <th>{{ $dosen->s3 }}</th>
    </tr>
    <tr>
        <th width="100px">Foto Dosen</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_Dosen/'.$dosen->foto_dosen) }}" width= "400px"</th>
    </tr>
    <tr>
        <th><a href="/dosen"class='btn btn-success tbn-sm'>Kembali</a></th>
        
    </tr>
</table>

@endsection