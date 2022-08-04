@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Proses Peminjaman
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-peminjaman.index') }}">Data Peminjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proses Peminjaman</li>
    @endslot

    @slot('actionButton')
        
    @endslot

    @slot('content')
    <form action="{{ route('admin.data-peminjaman.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h5>Detail Pememinjaman</h5>
        <hr>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Kode Peminjaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $peminjaman->kode_peminjaman }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Anggota Peminjaman</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $peminjaman->user->name }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Akan Diambil</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $peminjaman->tanggal_diambil }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_pengambilan">
            </div>
        </div>

        <h5 class="mt-5">Detail Buku</h5>
        <hr>
        <div class="row">
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $peminjaman->buku->judul }}" disabled>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $peminjaman->buku->pengarang }}" disabled>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $peminjaman->buku->th_terbit }}" disabled>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $peminjaman->buku->kategori->name }}" disabled>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $peminjaman->buku->penerbit }}" disabled>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled>{{ $peminjaman->buku->deskripsi }}</textarea>
                </div>
            </div>
        </div>
        <hr>

        <div class="row mb-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>

    </form>
    @endslot
</x-admin-page-component>
@endsection
