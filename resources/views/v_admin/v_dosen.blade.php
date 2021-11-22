@extends('templatesAdmin.v_templateAdmin')
@section('judul','Dosen')
@section('content')
<a href="/dosen/add"class="btn btn-primary btn-sm">Tambah</a><br>

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
                <th>NIP</th>
                <th>Nama Dosen</th>
                <th>Email</th>
                <th>S1</th>
                <th>S2</th>
                <th>S3</th>
                <th>Foto Dosen</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            <?php $no =1;?>
            @foreach ($dosen as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_dosen }}</td>
                    <td>{{ $data->email_dosen }}</td>
                    <td>{{ $data->s1 }}</td>
                    <td>{{ $data->s2 }}</td>
                    <td>{{ $data->s3 }}</td>
                    <td><img src="{{ url('foto_Dosen/'.$data->foto_dosen) }}" width= "100px"></td>
                    <td>
                        <a href="/dosen/detail/{{ $data->id }}"<i class="fas fa-info"></i></a> |
                        <a href="/dosen/edit/{{ $data->id }}"><i class="fas fa-edit"></i></a> |
                        <button data-toggle="modal" data-target="#hapus{{ $data->id }}"><i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($dosen as $data)
    <div class="modal fade" id="hapus{{ $data->id}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{ $data -> nama_dosen }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <a href="/dosen/delete/{{ $data->id }}" class="btn btn-outline-light">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
    </div>
    @endforeach
@endsection