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
        @foreach ($data_kategori as $kategori_DB)
            @if($data_pengumuman->kategori_id == $kategori_DB->id)
                <td>{{ $kategori_DB->kategori }}</td>
            @endif
        @endforeach
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