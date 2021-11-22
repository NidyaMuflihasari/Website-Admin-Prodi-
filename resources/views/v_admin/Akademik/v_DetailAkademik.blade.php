@extends('templatesAdmin.v_templateAdmin')
@section('judul','Detail Akademik')
@section('content')

<table class="table">
    <tr>
        <th width="100px">Judul</th>
        <th width="30px">:</th>
        <th>{{ $data_akademik->judul_akademik }}</th>
    </tr>
    <tr>
        <th width="100px">Kategori Akademik</th>
        <th width="30px">:</th>
        @foreach ($data_kategori as $kategori_DB)
            @if($data_akademik->kategori_id == $kategori_DB->id)
                <td>{{ $kategori_DB->kategori }}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <th width="100px">File Akademik</th>
        <th width="30px">:</th>
        <th><a href="{{ asset('akademik_Upload/'.$data_akademik->file_akademik) }}" target="blank">Lihat File</a></th>
    </tr>
    <tr>
        <th><a href="/data-akademik"class='btn btn-success tbn-sm'>Kembali</a></th>
        
    </tr>
</table>

@endsection