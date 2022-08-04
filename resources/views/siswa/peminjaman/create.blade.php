@extends('layouts.siswa')

@section('content')

<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Buku</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Katalog Buku</li>
            <li>{{ $buku->judul }}</li>
            <li>Buat Peminjaman Buku</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <div class="container">
		<div class="row my-4">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <h5>Detail Buku</h5>
                                <hr>
                                <div class="row">
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $buku->judul }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $buku->pengarang }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $buku->th_terbit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $buku->kategori->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $buku->penerbit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" disabled>{{ $buku->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Detail Peminjaman</h5>
                                <div class="row">
                                    <form action="{{ route('store-peminjaman') }}" method="POST">
                                    @csrf
                                        <div class="form-group row my-2">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">ID Anggota</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ auth()->user()->id }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Anggota</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row my-2">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Diambil</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_diambil">
                                            </div>
                                        </div>
                                        <input type="hidden" name="data_buku_id" value="{{ $buku->id }}">
                                        <div class="col mt-5 float-right">
                                            <button type="submit" class="btn btn-primary">AJUKAN PEMINJAMAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection