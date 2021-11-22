@extends('templatesAdmin.v_templateAdmin')
@section('judul','Pengumuman')
@section('content')
<a href="/tambah-pengumuman/create"class="btn btn-primary btn-sm">Tambah</a>
<a href="/data-kategoripengumuman"class="btn btn-primary float-right btn-sm">Kategori Pengumuman</a><br><br>

     @if(session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Sukses!</h5>
        {{ session('pesan') }}
      </div>
    @endif

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Pengumuman</th>
                <th>Kategori Pengumuman</th>
                <th>File Pengumuman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            <?php $no =1;?>
            @foreach ($data_pengumuman as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->judul_pengumuman }}</td>
                    @foreach ($data_kategori as $kategori_DB)
                        @if($data->kategori_id == $kategori_DB->id)
                          <td>{{ $kategori_DB->kategori }}</td>
                        @endif
                    @endforeach
                    <td><a href="{{ asset('pengumuman_Upload/'.$data->file_pengumuman) }}" target="blank">Lihat File</a></td>
                    <td>
                        <a href="/detail-pengumuman/show/{{ $data->id }}"<i class="fas fa-info"></i></a> |
                        <a href="/edit-pengumuman/edit/{{ $data->id }}"><i class="fas fa-edit"></i></a> |
                        <button data-toggle="modal" data-target="#hapus{{ $data->id }}"><i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($data_pengumuman as $data)
    <div class="modal fade" id="hapus{{ $data->id}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data -> judul_pengumuman }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/hapus-pengumuman/destroy/{{ $data->id }}" class="btn btn-outline-light">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
    </div>
    @endforeach
@endsection