@extends('templatesAdmin.v_templateAdmin')
@section('judul','Edit Kegiatan')
@section('content')
<form action="/update-kegiatan/update/{{ $data_kegiatan ->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label>Nama Kegiatan</label>
                    <input name="nama_kegiatan" class='form-control' value="{{ $data_kegiatan->nama_kegiatan }}">
                    <div class="text-danger">
                        @error('nama_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Waktu Kegiatan</label>
                    <input type="date" name="waktu_kegiatan" class='form-control' value="{{ $data_kegiatan->waktu_kegiatan }}">
                    <div class="text-danger">
                        @error('waktu_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class='form-group'>
                    <label>Kategori Kegiatan</label>
                    <select class='form-control select2' style="width:100%" name="kategori_id" id="kategori_id" value="{{ $data_kegiatan->kategori }}">
                        <option value="" disabled selected >Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='form-group'>
                    <label>Deskripsi Kegiatan</label><br>
                    {{-- <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" cols="84" rows="2">{{$data_kegiatan->deskripsi_kegiatan }}</textarea> --}}
                    <input id="deskripsi_kegiatan" type="hidden" name="deskripsi_kegiatan">
                    <trix-editor input="deskripsi_kegiatan">{!! $data_kegiatan->deskripsi_kegiatan !!}</trix-editor>
                    {{-- <text type="textarea" name="deskripsi_kegiatan" class='form-control' value="{{ $data_kegiatan->deskripsi_kegiatan }}"> --}}
                    <div class="text-danger">
                        @error('deskripsi_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">
                        <img src="{{ url('foto_Kegiatan/'.$data_kegiatan->foto_kegiatan) }}" width= "100px">
                    </div>
                    <div class="col-sm-8">
                        <div class='form-group'>
                            <label>Ganti Foto Kegiatan</label>
                            <input type='file' name="foto_kegiatan" class='form-control'>
                            <div class="text-danger">
                                @error('foto_kegiatan')
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