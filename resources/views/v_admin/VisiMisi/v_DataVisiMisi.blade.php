@extends('templatesAdmin.v_templateAdmin')
@section('judul','Visi & Misi')
@section('content')

     @if(session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Sukses!</h5>
        {{ session('pesan') }}
      </div>
    @endif

{{--  tabel visi  --}}
    @include('v_admin.VisiMisi.Visi.v_DataVisi')

    {{--  // tabel Misi  --}}
    <br><br><br>
    @include('v_admin.VisiMisi.Misi.v_DataMisi')
@endsection