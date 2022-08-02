@extends('layouts.admin')

@section('content')
<a href="/admin/tambah/databuku" class="btn btn-primary" title="Tambah" data-toggle="tooltip">
    <i class="fas fa-plus mr-2"></i> Tambah Data Buku
  </a>
<div class="card">
    <div class="card-body">
      <h5 style="text-align: justify" class="card-title">Data Buku Perpustakaan</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun Terbit</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($dataBuku as $data)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->jb }}</td>
                <td>{{ $data->pengarang }}</td>
                <td>{{ $data->penerbit }}</td>
                <td>{{ $data->th_terbit }}</td>
                <td>
                    <div class="d-flex align-items-center">
                      <a href="/admin/edit/databuku/{{$data->id}}" type="button" class="btn btn-success btn-sm btn-icon-text mr-3">
                        Edit
                        <i class="typcn typcn-edit btn-icon-append"></i>
                      </a>
                      <a href="/admin/databuku/delete/{{$data->id}}" class="btn btn-danger btn-sm mr-2" title="Hapus" data-toggle="tooltip" onclick="return confirm('Anda yakin mau menghapus data buku {{$data->judul}} ?')"> Delete<i class="typcn typcn-delete-outline btn-icon-append"></i></a>
                    </div>
                  </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

@endsection
