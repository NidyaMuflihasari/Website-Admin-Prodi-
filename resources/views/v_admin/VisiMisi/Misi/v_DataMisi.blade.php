<h2>Misi</h2>
<a href="/tambah-misi/createMisi"class="btn btn-primary btn-sm">Tambah</a><br>
<table class='table table-bordered'>
    <thead>
         <tr>
             <th>No</th>
             <th>Misi Program Studi</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody> 
        <?php $no =1;?>
         @foreach ($data_misi as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->misi_prodi }}</td>
                <td>
                  <a href="/detail-misi/showMisi/{{ $data->id }}"<i class="fas fa-info"></i></a> |
                  <a href="/edit-misi/editMisi/{{ $data->id }}"><i class="fas fa-edit"></i></a> |
                  <button data-toggle="modal" data-target="#hapus{{ $data->id }}"><i class="fas fa-trash"></i>
                  </button>
                </td>
             </tr>
      @endforeach
  </tbody>
</table>

@foreach ($data_misi as $data)
  <div class="modal fade" id="hapus{{ $data->id}}">
      <div class="modal-dialog modal-sm">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">{{ $data -> misi_prodi }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
            <a href="/hapus-misi/destroyMisi/{{ $data->id }}" class="btn btn-outline-light">Ya</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
  </div>
  @endforeach