@extends('templatesAdmin.v_templateAdmin')
@section('judul','Edit Dosen')
@section('content')
<form action="/dosen/update/{{ $dosen->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>NIP</label>
                    <input name="nip" class='form-control' value="{{ $dosen->nip }}" readonly>
                    <div class="text-danger">
                        @error('nip')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Nama Dosen</label>
                    <input name="nama_dosen" class='form-control' value="{{ $dosen->nama_dosen }}">
                    <div class="text-danger">
                        @error('nama_dosen')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Email</label>
                    <input name="email_dosen" class='form-control' value="{{ $dosen->email_dosen }}">
                    <div class="text-danger">
                        @error('email_dosen')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>S1</label>
                    <input name="s1" class='form-control' value="{{ $dosen->s1 }}">
                    <div class="text-danger">
                        @error('s1')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>S2</label>
                    <input name="s2" class='form-control' value="{{ $dosen->s2 }}">
                    <div class="text-danger">
                        @error('s2')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>S3</label>
                    <input name="s3" class='form-control' value="{{ $dosen->s3 }}">
                    <div class="text-danger">
                        @error('s3')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">
                        <img src="{{ url('foto_Dosen/',$dosen->foto_dosen) }}" width="100px">
                    </div>
                    <div class="col-sm-8">
                        <div class='form-group'>
                            <label>Ganti Foto Dosen</label>
                            <input type='file' name="foto_dosen" class='form-control'>
                            <div class="text-danger">
                                @error('foto_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
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