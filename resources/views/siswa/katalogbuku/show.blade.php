@extends('layouts.siswa')

@section('content')

<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/perpustakaan.jpg');">
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
                            <div class="col-3">
                                <img src="{{ asset('assets/img/buku/'.$buku->gambar) }}" alt="" class="img-fluid" style="height: 280px;">
                            </div>
                            <div class="col-9">
                                <h1 class="mb-4">{{ $buku->judul }}</h1>
                                <div class="row my-2">
                                    <div class="col-2"><b>Pengarang</b></div>
                                    <div class="col-10">{{ $buku->pengarang }}</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-2"><b>Tahun</b></div>
                                    <div class="col-10">{{ $buku->th_terbit }}</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-2"><b>Kategori</b></div>
                                    <div class="col-10"><span class="badge bg-success">{{ $buku->kategori->name }}</span></div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-2"><b>Penerbit</b></div>
                                    <div class="col-10">{{ $buku->penerbit }}</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-2"><b>Deskripsi</b></div>
                                    <div class="col-10">{{ $buku->deskripsi }}</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-2"><b>Jumlah</b></div>
                                    <div class="col-10"><span class="badge bg-dark">{{ $buku->jumlah }}</span></div>
                                </div>
                                <div class="row my-2">
                                  <div class="col-2"><b>Lokasi Rak</b></div>
                                  <div class="col-10"><span class="badge bg-dark">{{ $buku->rak->name }}</span></div>
                              </div>
                                <div class="row my-3">
                                    <div class="col-3">
                                        <a href="{{ route('create-peminjaman', $buku->id) }}" class="btn btn-primary">PINJAM</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection