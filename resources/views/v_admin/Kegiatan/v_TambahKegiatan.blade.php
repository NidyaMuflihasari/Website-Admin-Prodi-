@extends('templatesAdmin.v_templateAdmin')
@section('judul','Tambah Kegiatan')
@section('content')

<form action="/insert-kegiatan/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Nama Kegiatan</label>
                    <input name="nama_kegiatan" class='form-control' value="{{ old('nama_kegiatan') }}">
                    <div class="text-danger">
                        @error('nama_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Waktu Kegiatan</label>
                    <input type="date" name="waktu_kegiatan" class='form-control' value="{{ old('waktu_kegiatan') }}">
                    <div class="text-danger">
                        @error('waktu_keaiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Kategori Kegiatan</label>
                    <select class='form-control select2' style="width:100%" name="kategori_id" id="kategori_id">
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{old('kategori_id') == $item->id ? 'selected' : null }}>{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                    {{--  <div class="text-danger">
                        @error('nama_dosen')
                            {{ $message }}
                        @enderror
                    </div>  --}}
                </div>

                <div class='form-group'>
                    <label>Deskripsi Kegiatan</label><br>
                    {{-- <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" cols="84" rows="2">{{ old('deskripsi_kegiatan') }}</textarea> --}}
                    <input id="deskripsi_kegiatan" type="hidden" name="deskripsi_kegiatan" value="{{ old('deskripsi_kegiatan') }}">
                    <trix-editor input="deskripsi_kegiatan"></trix-editor>
                    {{--  <input type="textarea" name="deskripsi_kegiatan" class='form-control' value="{{ old('deskripsi_kegiatan') }}">  --}}
                    <div class="text-danger">
                        @error('deskripsi_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Foto Kegiatan</label>
                    <input type='file' name="foto_kegiatan" class='form-control'>
                    <div class="text-danger">
                        @error('foto_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <a href="/data-kategorikegiatan"class="btn btn-primary btn-sm">Kategori Kegiatan</a>
                    <button class='btn btn-primary btn-sm'>Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection