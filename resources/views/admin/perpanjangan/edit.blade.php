@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Proses Perpanjangan
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-peminjaman.index') }}">Data Peminjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Proses Perpanjangan</li>
    @endslot

    @slot('actionButton')
        
    @endslot

    @slot('content')
    <form action="{{ route('admin.data-perpanjangan.update', $peminjaman->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pengambilan</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_pengambilan" value="{{ $peminjaman->tanggal_pengambilan }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Jadwal Pengambilan</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_pengambilan" value="{{ $peminjaman->tanggal_pengembalian }}" disabled>
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
        <h5 class="mt-5">Perpanjangan</h5>
        <hr>
        <div class="row">
            <span class="alert alert-warning">Maksimal perpanjang peminjaman 1 Minggu</span>
        </div>
        <div class="row">
            <div class="form-group row my-2">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Perpanjang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->addWeeks(1)->format('d/m/Y') }}" disabled>
                </div>
                <input type="hidden" name="tanggal_pengembalian" value="{{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->addWeeks(1) }}">
            </div>
        </div>

        <div class="row mb-3 mt-5">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>

    </form>
    @endslot
</x-admin-page-component>
@endsection
