@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Tambah Data Anggota
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-anggota.index') }}">Data Anggota</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Anggota</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Tambah Anggota</h5>    
    @endslot

    @slot('content')
    <form action="{{ route('admin.data-anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" name="foto" accept=".jpg, .png, .jpeg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">ID Anggota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
                <select name="kelas" id="kelas" class="form-control">
                    <option selected disabled hidden>--Pilih Kelas--</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">No. HP</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="phone">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea name="address" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.data-anggota.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>

    </form>
    @endslot
</x-admin-page-component>
@endsection
