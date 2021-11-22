@extends('templatesAdmin.v_templateAdmin')
@section('judul','Edit Misi')
@section('content')
<form action="/update-misi/updateMisi/{{ $data_misi ->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Misi Program Studi</label>
                    <textarea name="misi_prodi" id="misi_prodi" cols="84" rows="2">{{ $data_misi->misi_prodi }}"</textarea>
                    <div class="text-danger">
                        @error('misi_prodi')
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