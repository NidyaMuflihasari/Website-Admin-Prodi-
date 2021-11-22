@extends('templatesAdmin.v_templateAdmin')
@section('judul','Detail Pengumuman')
@section('content')

<table class="table">
    <tr>
        <th width="100px">Judul Pengumuman</th>
        <th width="30px">:</th>
        <th>{{ $data_pengumuman->judul_pengumuman }}</th>
    </tr>
    <tr>
        <th width="100px">Kategori Pengumuman</th>
        <th width="30px">:</th>
        @if(($data_pengumuman->kategori_id)==1)
            <th>Jadwal BRS</th>
        @elseif(($data_pengumuman->kategori_id)==2)
            <th>Jadwal Kuliah</th>
        @elseif(($data_pengumuman->kategori_id)==3)
            <th>Jadwal UTS</th>
        @elseif(($data_pengumuman->kategori_id)==4)
            <th>Jadwal UAS</th>
        @elseif(($data_pengumuman->kategori_id)==5)
            <th>Kegiatan Perkuliahan</th>
        @endif
    </tr>
    <tr>
        <th width="100px">File Pengumuman</th>
        <th width="30px">:</th>
        <th><a href="{{ asset('pengumuman_Upload/'.$data_pengumuman->file_pengumuman) }}" target="blank">Lihat File</a></th>
    </tr>
    <tr>
        <th><a href="/data-pengumuman"class='btn btn-success tbn-sm'>Kembali</a></th>
        
    </tr>
</table>

@endsection