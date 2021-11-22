@extends('templatesAdmin.v_templateAdmin')
@section('judul','Detail Kegiatan')
@section('content')

<table class="table">
    <tr>
        <th width="100px">Nama Kegiatan</th>
        <th width="30px">:</th>
        <th>{{ $data_kegiatan->nama_kegiatan }}</th>
    </tr>
    <tr>
        <th width="100px">Waktu Kegiatan</th>
        <th width="30px">:</th>
        <th>{{ $data_kegiatan->waktu_kegiatan }}</th>
    </tr>
    <tr>
        <th width="100px">Kategori Kegiatan</th>
        <th width="30px">:</th>
        @if(($data_kegiatan->kategori_id)==1)
            <th>Kegiatan Dosen</th>
        @elseif(($data_kegiatan->kategori_id)==2)
            <th>Kegiatan Mahasiswa</th>
        @elseif(($data_kegiatan->kategori_id)==3)
            <th>Kegiatan Lomba</th>
        @endif
    </tr>
    <tr>
        <th width="100px">Deskripsi Kegiatan</th>
        <th width="30px">:</th>
        <th>{!! $data_kegiatan->deskripsi_kegiatan !!}</th>
    </tr>
    <tr>
        <th width="100px">Foto Kegiatan</th>
        <th width="30px">:</th>
        <th><img src="{{ asset('foto_Kegiatan/'.$data_kegiatan->foto_kegiatan) }}" width= "400px"</th>
    </tr>
    <tr>
        <th><a href="/data-kegiatan"class='btn btn-success tbn-sm'>Kembali</a></th>
        
    </tr>
</table>

@endsection