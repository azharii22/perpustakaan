@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Reset Password
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.reset-password.index') }}">Reset Password</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Reset Password</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Reset Password</h5>    
    @endslot

    @slot('content')
    <form action="{{ route('admin.reset-password.update', $data_anggota->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="row mb-2">  
            <div class="col">
                <img src="{{ asset('assets/img/profile/'.$data_anggota->foto) }}" alt="gambar" style="height: 200px; width: 150px;">
            </div>
        </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">ID Anggota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" value="{{ $data_anggota->username }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $data_anggota->name }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kelas" value="{{ $data_anggota->kelas }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{ $data_anggota->tanggal_lahir }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone" value="{{ $data_anggota->phone }}" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea name="address" class="form-control" disabled>{{ $data_anggota->address }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ $data_anggota->email }}" disabled>
                </div>
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
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>

    </form>
    @endslot
</x-admin-page-component>
@endsection
