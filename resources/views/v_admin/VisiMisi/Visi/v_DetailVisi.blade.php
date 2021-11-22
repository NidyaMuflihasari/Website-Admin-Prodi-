@extends('templatesAdmin.v_templateAdmin')
@section('judul','Detail Visi Program Studi')
@section('content')

<table class="table">
    <tr>
        <th width="100px">Visi Program Studi</th>
        <th width="30px">:</th>
        <th>{!! $data_visi->visi_prodi !!}</th>
    </tr>
    <tr>
        <th><a href="/data-visimisi"class='btn btn-success tbn-sm'>Kembali</a></th>
        
    </tr>
</table>

@endsection