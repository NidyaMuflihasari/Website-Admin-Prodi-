@extends('templatesAdmin.v_templateAdmin')
@section('judul','Tambah Kategori Akademik')
@section('content')
<form action="/insert-kategoriakademik/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Jenis Akademik</label>
                    <input name="kategori" class='form-control' value="{{ old('kategori') }}">
                    <div class="text-danger">
                        @error('kategori')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <button class='btn btn-primary btn-sm'>Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection