@extends('templatesAdmin.v_templateAdmin')
@section('judul','Edit Visi')
@section('content')
<form action="/update-visi/updateVisi/{{ $data_visi ->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class='content'>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='form-group'>
                    <label for="visi_prodi" class="form_label">Visi Program Studi</label>
                    {{-- <textarea name="visi_prodi" id="visi_prodi" cols="84" rows="2">{{ $data_visi->visi_prodi }}"</textarea> --}}
                    <input id="visi_prodi" type="hidden" name="visi_prodi" value="{{ old('visi_prodi') }}">
                    <trix-editor input="visi_prodi">{!! $data_visi->visi_prodi !!}</trix-editor>
                    <div class="text-danger">
                        @error('visi_prodi')
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
<script>
    document.addEventListener('trix-file-accept', function(e)){
        e.preventDefault();
    }
</script>
@endsection