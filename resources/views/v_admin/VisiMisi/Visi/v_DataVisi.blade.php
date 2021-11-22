<br><h2>Visi</h2>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Visi Program Studi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            @foreach ($data_visi as $data)
                <tr>
                    <td>{!! $data->visi_prodi !!}</td>
                    <td>
                        <a href="/detail-visi/showVisi/{{ $data->id }}"><i class="fas fa-info"></i></a> |
                        <a href="/edit-visi/editVisi/{{ $data->id }}"><i class="fas fa-edit"></i></a> |
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
