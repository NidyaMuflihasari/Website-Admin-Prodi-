@extends('templatesAdmin.v_templateAdmin')
@section('judul','Kategori Akademik')
@section('content')
<a href="/tambah-kategoriakademik/create"class="btn btn-primary btn-sm">Tambah</a><br><br>

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
                <th>Kategori Akademik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            <?php $no =1;?>
            @foreach ($data_kategoriaka as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kategori }}</td>
                    <td>
                        <button data-toggle="modal" data-target="#hapus{{ $data->id }}"><i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
<a href="/tambah-akademik/create"class="btn btn-success float-right btn-sm">Kembali</a>

    @foreach ($data_kategoriaka as $data)
    <div class="modal fade" id="hapus{{ $data->id}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data -> kategori }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/hapus-kategoriakademik/destroy/{{ $data->id }}" class="btn btn-outline-light">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
    </div>
    @endforeach
@endsection