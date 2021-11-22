@extends('templatesAdmin.v_templateAdmin')
@section('judul','Edit Akademik')
@section('content')
<form action="/update-akademik/update/{{ $data_akademik ->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Judul</label>
                    <input name="judul_akademik" class='form-control' value="{{ $data_akademik->judul_akademik }}">
                    <div class="text-danger">
                        @error('judul_akademik')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Kategori Akademik</label>
                    <select class='form-control select2' style="width:100%" name="kategori_id" id="kategori_id">
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                    {{--  <div class="text-danger">
                        @error('nama_dosen')
                            {{ $message }}
                        @enderror
                    </div>  --}}
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">
                        <a href="{{ asset('akademik_Upload/'.$data_akademik->file_akademik) }}" target="blank">Lihat File</a>
                    </div>
                    <div class="col-sm-8">
                        <div class='form-group'>
                            <label>Ganti File Akademik</label>
                            <input type='file' name="file_akademik" class='form-control'>
                            <div class="text-danger">
                                @error('file_pengumuman')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{--  <div class='form-group'>
                    <label>File Pengumuman</label>
                    <input type='file' name="file_pengumuman" class='form-control'>
                    <div class="text-danger">
                        @error('file_pengumuman')
                            {{ $message }}
                        @enderror
                    </div>
                </div>  --}}

                <div class='form-group'>
                    <button class='btn btn-primary btn-sm'>Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection