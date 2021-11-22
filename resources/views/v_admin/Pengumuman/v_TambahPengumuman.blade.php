@extends('templatesAdmin.v_templateAdmin')
@section('judul','Tambah Pengumuman')
@section('content')
<form action="/insert-pengumuman/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Judul Pengumuman</label>
                    <input name="judul_pengumuman" class='form-control' value="{{ old('judul_pengumuman') }}">
                    <div class="text-danger">
                        @error('judul_pengumuman')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Kategori Pengumuman</label>
                    <select class='form-control select2' style="width:100%" name="kategori_id" id="kategori_id">
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            @if (old('kategori_id')== $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                    {{--  <div class="text-danger">
                        @error('nama_dosen')
                            {{ $message }}
                        @enderror
                    </div>  --}}
                </div>

                <div class='form-group'>
                    <label>File Pengumuman</label>
                    <input type='file' name="file_pengumuman" class='form-control'>
                    <div class="text-danger">
                        @error('file_pengumuman')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <a href="/data-kategoripengumuman"class="btn btn-primary btn-sm">Kategori Pengumuman</a>
                    <button class='btn btn-primary btn-sm'>Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection